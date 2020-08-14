<?php

use Illuminate\Database\Seeder;
use \App\Models\Song;
use \App\Models\Category;

class SongsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Category::class,10)->create()->each(function ($category) {
            factory(Song::class,25)->create(['category_id'=>$category->id]);
        });
    }
}
