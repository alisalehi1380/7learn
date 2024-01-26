<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use  App\Models\Post;
use  App\Models\Tag;
use  App\Models\Category;
use App\Services\Elastic;
use App\Jobs\SendSmsJob;


class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {    
        $cap = 1000;
        $chunk = 100;
        for($i = 0;$i< $cap ;$i+= $chunk) {
            //create post
            $posts = Post::factory()->count($chunk)->create();

          
            $posts->each(function ($post){

               //integration with elasticsearch
                 $elastic = new Elastic();
                 $elastic->index($post);
                //attach tags
                $tags = Tag::inRandomOrder()->limit(rand(2,10))->pluck("id");
                $post->tags()->sync($tags);
            });
        }
      
        dispatch(new SendSmsJob(array(env("OWNER_MOBILE")),"ElasticSearch is updated."));
     
   }
}
