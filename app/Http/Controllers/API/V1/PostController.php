<?php

namespace App\Http\Controllers\API\V1;
use App\Http\Filters\V1\PostsFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Resources\PostRessource;

use App\Models\Post;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PostsFilter $postFilter)
    {
        return PostRessource::collection(Post::filter($postFilter)->paginate());


    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //for Blade
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {



        $post =Post::create($request->all());
        if ($post) {
            $post->attach_category(request("category_id"));
            $post->attach_meida(request("media_id"));
            $post->admin()->attach(request("admin_id"));


            return response()->json([
                "status" => true,
                "data"=>$post,
                "message" => "Post Aded Succes ",
            ]);
        }else{
            return response()->json([

                "status" => false,
                "message" => "post not created "
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post=Post::find($id);
        if($post)
        {
        return  new PostRessource($post);
    }

        /// error api reuqest muts be make buy a class
        ///
        return response()->json([

            "status" => false,
            "message" => "post not found "
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // for blade
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, string $id)
    {
        $post = Post::find($id);
        if ($post) {
            $update_posts =$post->update($request->all());
            $admin_id=request("admin_id");
            $category_id=request("category_id");
            $media_id=request("media_id");
            $post->attach_category(request("category_id"));
            $post->attach_meida(request("media_id"));
            $post->attach_admin(request("admin_id"));
            return new  PostRessource($post);
        }
        return response()->json([

            "status" => false,
            "message" => "post not found "
        ]);

    }
    public function  replace(PostRequest $request, string $id)
    {
        $post = Post::findOrFail($id);
        if ($post) {
            $update_posts =$post->update($request->all());
         $admin_id=request("admin_id");
            $category_id=request("category_id");
            $media_id=request("media_id");
            $post->attach_category(request("category_id"));
            $post->attach_meida(request("media_id"));
            $post->attach_admin(request("admin_id"));
            if($update_posts)
            return new PostRessource($post);
            else{
                return response()->json([

                    "status" => false,
                    "message" => "post not found "
                ]);
            }
        }
        return response()->json([

            "status" => false,
            "message" => "post not found "
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        if ($post) {
            $delete = Post::destroy($post->id);
            return response()->json([
                "data"=>$post,
                "status" => true,
                "message" => "delete succes"

            ]);

        } else {
            return response()->json([

                "status" => false,
                "message" => "post not found "
            ]);
        }
    }

}