<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Filters\V1\PostsFilter;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\PostRessource;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Database\Eloquent\Builder;

class CategoryPostsController extends Controller
{
    public function index($category_id, PostsFilter $postsFilter)
    {
        $posts = Post::with('category')
            ->whereHas('category', function ($query) use ($category_id) {
                $query->where('category_id', $category_id);
            })->
            filter($postsFilter)->get();

        return PostRessource::collection($posts);
    }
}
