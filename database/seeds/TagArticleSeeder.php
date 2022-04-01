<?php

use Illuminate\Database\Seeder;

class TagArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\TagArticle::class, 30)->create();
    }
}
