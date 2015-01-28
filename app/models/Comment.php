<?php


class Comment extends Eloquent {

    protected $table = 'comments';

    protected $fillable = array(
        'commentable_type',
        'commentable_id',
        'comment',
        'user_id',
    );


    public function commentable() {
        return $this->morphTo();
    }


    public function user() {
        return $this->belongsTo('User');
    }


    public function getOnTitleAttribute() {
        $commentable = $this->commentable;
        if (!is_object($commentable) || !method_exists($commentable, 'getAttributes'))
            return FALSE;

        $attributes = $commentable->getAttributes();
        if (method_exists($commentable, 'getCommentableTitle'))
            $on = $commentable->getCommentableTitle();
        elseif (array_key_exists('title', $attributes))
            $on = $attributes['title'];
        elseif (array_key_exists('name', $attributes))
            $on = $attributes['name'];
        else
            throw new \Exception(sprintf('%s model does not have title or name attribute, nor implements getCommentableTitle() method', get_class($commentable)));

        return Str::limit($on, 50);
    }


    public function getCommentForAdministratorAttribute($value) {
        return Str::limit(htmlspecialchars($value, null, 'UTF-8'), 50);
    }


    public function getRules($commentableType) {
        $commentableObj = new $commentableType;
        $table = $commentableObj->getTable();
        $key = $commentableObj->getKeyName();

        $rules = array(
            'commentable_type' => 'required|in:Post',
            'commentable_id' => 'required|exists:' . $table . ',' . $key,
            'comment' => 'required',
        );

        return $rules;
    }


    public function getUrl() {
        $commentable = $this->commentable;
        $url = false;

        if (method_exists($commentable, 'getUrl'))
            $url = $commentable->getUrl();

        return \URL::to($url . '#comment-' . $this->id);
    }


    public function getDate() {
        $date = $this->created_at;
        $dateFormat = Config::get('settings.site.date_format', 'j\<\s\u\p\>S\<\/\s\u\p\> F \'y');

        return date($dateFormat, strtotime($date));
    }
}