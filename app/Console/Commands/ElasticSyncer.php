<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use App\Services\Elastic;

class ElasticSyncer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'elastic-syncer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Afrer runing this command ElasticSearch index and database should be sync togheder.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Post::chunk(1000, function (Collection $posts) {
            try
            {
                foreach ($posts as $post) 
                {
                    $elastic = new Elastic();
                    $elastic->index($post);
                    echo $post->id.".".$post->title." is tranfered.\n";
                }
            }
            catch (\Exception $e)
            {
                echo $e->getMessage()."\n";
            }
           
        });

        
    }
}
