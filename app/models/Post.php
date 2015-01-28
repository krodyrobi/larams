<?php

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Post extends Eloquent implements SluggableInterface {
    use SluggableTrait;
    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];
    protected $guarded = array('slug', 'created_at', 'updated_at', 'deleted_at');

    protected $sluggable = array(
        'build_from' => 'title',
        'save_to' => 'slug',
        'separator' => '-',
        'unique' => true,
        'include_trashed' => true,
    );

    const DRAFT = 'DRAFT';
    const APPROVED = 'APPROVED';

    protected $table = 'posts';
    protected $configSettings = 'settings.site';


    public function author() {
        return $this->belongsTo('User', 'author_id', 'id');
    }


    public function scopeLive($query) {
        return $query->where($this->getTable() . '.status', '=', self::APPROVED)
            ->where($this->getTable() . '.published_date', '<=', \Carbon\Carbon::now());
    }


    public function scopeByYearMonth($query, $year, $month) {
        return $query->where(\DB::raw('DATE_FORMAT(published_date, "%Y%m")'), '=', $year . $month);
    }


    public static function archives() {
        // Get the data
        $archives = self::live()
            ->select(\DB::raw('
				YEAR(`published_date`) AS `year`,
				DATE_FORMAT(`published_date`, "%m") AS `month`,
				MONTHNAME(`published_date`) AS `monthname`,
				COUNT(*) AS `count`
			'))
            ->groupBy(\DB::raw('DATE_FORMAT(`published_date`, "%Y%m")'))
            ->orderBy('published_date', 'desc')
            ->get();

        // Convert it to a nicely formatted array so we can easily render the view
        $results = array();
        foreach ($archives as $archive) {
            $results[$archive->year][$archive->month] = array(
                'monthname' => $archive->monthname,
                'count' => $archive->count,
            );
        }

        return $results;
    }


    public function getArchiveUrl() {
        $date = date('Y m' , strtotime($this->published_date));

        return URL::action('PostsController@indexByYearMonth', explode(' ', $date));
    }


    public function getDate() {
        return date(Config::get($this->configSettings() . '.date_format', 'j\<\s\u\p\>S\<\/\s\u\p\> F \'y'), strtotime($this->published_date));
    }


    public function getUrl() {
        return URL::action('PostsController@show', array('slug' => $this->slug));
    }


    public function newer() {
        return $this->live()
            ->where('published_date', '>=', $this->published_date)
            ->where('id', '<>', $this->id)
            ->orderBy('published_date', 'asc')
            ->orderBy('id', 'asc')
            ->first();
    }


    public function older() {
        return $this->live()
            ->where('published_date', '<=', $this->published_date)
            ->where('id', '<>', $this->id)
            ->orderBy('published_date', 'desc')
            ->orderBy('id', 'desc')
            ->first();
    }


    public function configSettings() {
        return $this->configSettings;
    }


    public function perPage() {
        $config = intval(Config::get($this->configSettings() . '.index_per_page', 10));

        return $config;
    }
}
