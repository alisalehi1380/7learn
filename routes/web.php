<?php

use Illuminate\Support\Facades\Route;
use Elastic\Elasticsearch\ClientBuilder;
use App\Services\Elastic;
use App\Models\Post;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/set', function () {

//   return  Post::create([
//         'title' => fake()->name(),
//         'content' => fake()->text(200),
//         'publishDateTime' => fake()->dateTime(),
//         'status' => rand(0, 1) ? 'Archive' : 'Publish'
//     ]);

    $elastic = new Elastic();
    $params = [
        'index' => 'posts',
        'id' => 40,
        'body' => [
            'title' => fake()->name(),
            'content' => fake()->text(200),
            'publishDateTime' => fake()->dateTime(),
            'status' => rand(0, 1) ? 'Archive' : 'Publish'
        ] 
    ];

      $elastic->index($params);

});


Route::get('/show', function () {


        $elastic = new Elastic();
        $params = [
            'index' => 'posts',
            'id'    =>  31
        ];
    
        $response = $elastic->show($params)->_source;

        return $response;
        
    
    });



Route::get('/list', function () {

    $from =0;
    if(is_numeric(request('page')) && request('page')>0)
    {
         $from = request('page')-1;
    } 

    $filter = array();

    if (isset($_GET['title']))
    {
        $filter['query'] = [ 'match' => ['title' => $_GET['title'] ]];
    }

    $params = [
         "from"=> $from,
         "size"=> 100,
         'index' => 'posts',
         'body'  => $filter
    ];

    $elastic = new Elastic();
    $response = $elastic->list($params)->hits->hits;

    return $response;
    

});

 