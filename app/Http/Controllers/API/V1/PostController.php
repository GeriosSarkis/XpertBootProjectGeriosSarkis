<?php

namespace app\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use function App\Http\Controllers\API\request;
use function App\Http\Controllers\API\response;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with("admin", "category", "medias")->get();
    return response()->json([
        "data"=>$posts,
        "message"=>"All Post Get",
        "status"=>true,


]);

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
            $post->attach_Category(request("category_id"));
            $post->attach_Meidas(request("media_id"));
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
        return response()->json([
            "status" => true,
            "data" => $post,
            "message" => "post found",


        ]);
    }
    else{
        return response()->json([

            "status" => false,
            "message" => "post not found "
        ]);
    }
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
            return response()->json([

                "data" => $update_posts,

                "message" => "post Udpdated Succes ",
                "status" => true
            ]);
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
