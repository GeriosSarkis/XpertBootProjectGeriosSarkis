<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Filters\V1\PostsFilter;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\PostRessource;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Models\category;
class CategoryPostsController extends Controller
{
    public function index($category_id, PostsFilter $postsFilter)
    {
        // Retrieve the category by ID
        // Retrieve the category by ID
        $category = Category::findOrFail($category_id);

        // Get the posts query for the category and apply the filter
        $postsQuery = $category->post()->filter($postsFilter);

        // Get the posts after applying the filter
        $posts = $postsQuery->get();

        return PostRessource::collection($posts);
    }
}