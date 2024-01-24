<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use  App\Models\Post;
use  App\Models\Tag;
use  App\Models\Category;
use Illuminate\Support\Facades\DB;


class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {    
        $cap = 1000000;
        $chunk = 1000;
        for($i = 0;$i< $cap ;$i+= $chunk) {
            $posts = Post::factory()->count($chunk)->create();
            $posts->each(function ($post){
                $tags = Tag::inRandomOrder()->limit(rand(2,10))->pluck("id");
                $post->tags()->sync($tags);
            });
        }
   }
}
