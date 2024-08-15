<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Filters\V1\PostsFilter;
use App\Http\Resources\V1\PostRessource;
use App\Models\Post;

class CategoryPostsController extends Controller
{
    public function index($category_id, PostsFilter $postsFilter)
    {

        $posts = Post::with('category_post')
            ->whereHas('category_post', function ($query) use ($category_id) {
                $query->where('category_id',"=", $category_id);
            })->
            filter($postsFilter)->get();


        return PostRessource::collection($posts);

    }
}