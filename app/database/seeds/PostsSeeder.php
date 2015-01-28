<?php

class PostsSeeder extends Seeder {
    protected $post;
    protected $author_ids;
    protected $faker;

    public function run() {
        DB::table('posts')->delete();
        $this->faker = \Faker\Factory::create();

        $admin = User::where('username', '=', 'admin')->first();
        $moderator = User::where('username', '=', 'moderator')->first();

        $this->author_ids = [$admin->id, $moderator->id];

        for ($i = 0; $i < 1000; $i++)
            $this->create($i);
    }

    protected function create($index) {
        $this->post = new Post();
        $this->setTitle();
        $this->setSummary();
        $this->setContent();
        $this->setPageTitle();
        $this->setMetaDescription();
        $this->setMetaKeywords();
        $this->setStatus();
        $this->setPublishedDate();

        $this->post->author_id = $this->author_ids[ $index % count($this->author_ids) ];

        $this->post->save();
    }

    protected function setTitle() {
        $title = $this->faker->sentence(rand(1, 10));
        $this->post->title = $title;
    }

    protected function setSummary() {
        $this->post->summary = '<p>' . implode('</p><p>', $this->faker->paragraphs(rand(1, 2))) . '</p>';
    }

    protected function setContent() {
        $this->post->content = '<p>' . implode('</p><p>', $this->faker->paragraphs(rand(4, 10))) . '</p>';
    }

    protected function setPageTitle() {
        $this->post->page_title = $this->post->title;
    }

    protected function setMetaDescription() {
        $this->post->meta_description = $this->faker->paragraph(rand(1, 2));
    }

    protected function setMetaKeywords() {
        $this->post->meta_keywords = $this->faker->words(10, true);
    }

    protected function setStatus() {
        $statuses = array(
            Post::DRAFT,
            Post::APPROVED
        );
        $this->post->status = $this->faker->randomElement($statuses);
    }

    protected function setPublishedDate() {
        $this->post->published_date = $this->faker->dateTimeBetween('-2 years', '+1 month')->format('Y-m-d H:i:s');
    }
}
