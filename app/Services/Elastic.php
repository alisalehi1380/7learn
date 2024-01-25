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

    public function index($params)
    {
         dd($this->client->index($params));
    }


    public function show($params)
    {
       return (json_decode($this->client->get($params)));
    }

    public function list($params)
    {
       return (json_decode($this->client->search($params)));
    }
   
 
}