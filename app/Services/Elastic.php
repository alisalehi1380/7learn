<?php

namespace App\Services;
use Elastic\Elasticsearch\ClientBuilder;

class Elastic
{
   private $client;

    function __construct() 
    {
      $this->client =  ClientBuilder::create()
      ->setHosts([env('ELASTICSEARCH_ENDPOINT')])
      ->setApiKey(env('ELASTICSEARCH_KEY'))
      ->build();
    }

    public function index($post)
    {
 
      $params = [
         'index' => 'posts',
         'id' => $post->id,
         'body' => [
             'title' => $post->title,
             'content' => $post->content,
             'publish_date_time' => $post->publish_date_time,
             'status' => $post->status,
             'created_at' => $post->created_at,
             'updated_at' => $post->created_at,
         ] 
     ];
   
     $this->client->index($params);
    }

    public function show($params)
    {
       return (json_decode($this->client->get($params)));
    }

    public function list($params)
    {
       return (json_decode($this->client->search($params)));
    }

    public function update($post):void
    {
      $params = [
         'index' => 'posts',
         'id' => $post->id,
         'body' => [
             'title' => $post->title,
             'content' => $post->content,
             'publishDateTime' => $post->publishDateTime,
             'status' => $post->status,
         ] 
     ];
      
     $this->client->update($params);
    }

    public function delete($post):void
    {
         $params = [
            'index' => 'posts',
            'id' => $post->id];
         
      $this->client->delete($params);
    }
   
}