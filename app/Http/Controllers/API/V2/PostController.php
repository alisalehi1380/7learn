<?php

namespace App\Http\Controllers\API\V2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('tags.categories')->orderBy('created_at','asc')->paginate(100);
        return response()->json(['posts' => $posts]);
    }
}
