<?php

class PostsController extends Controller {
    protected $post;
    protected $per_page;

    public function __construct(Post $post) {
        $this->post = $post;
        $this->per_page = $post->perPage();
    }

    public function index() {
        $posts = $this->post->live()
            ->orderBy($this->post->getTable() . '.published_date', 'desc')
            ->with('author')
            ->paginate($this->per_page);


        if (Config::get('settings.site.index_show_archives'))
            $archives = $this->post->archives();

        return View::make('layouts/index', compact('posts', 'archives'));
    }


    public function show($slug) {
        $post = $this->post->live()
            ->where($this->post->getTable().'.slug', '=', $slug)
            ->with('author')
            ->firstOrFail();

        $newer = $older = false;
        if (Config::get('settings.site.show_adjacent_items')) {
            $newer = $post->newer();
            $older = $post->older();
        }

        if (Config::get('settings.site.index_show_archives'))
            $archives = $this->post->archives();


        return View::make('layouts/article', compact('post', 'newer', 'older', 'archives'));
    }


    public function indexByYearMonth($selectedYear, $selectedMonth) {
        $posts = $this->post->live()
            ->byYearMonth($selectedYear, $selectedMonth)
            ->orderBy($this->post->getTable() . '.published_date', 'desc')
            ->with('author')
            ->paginate($this->per_page);

        if (Config::get('settings.site.index_show_archives'))
            $archives = $this->post->archives();

        return View::make('layouts/archive', compact('posts', 'selectedYear', 'selectedMonth', 'archives'));
    }

}