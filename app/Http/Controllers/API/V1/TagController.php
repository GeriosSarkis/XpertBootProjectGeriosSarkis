<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Http\Resources\TagResource;
use App\Models\tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = tag::all();
        return TagResource::collection($tags);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TagRequest $request)
    {
        $tag=tag::create($request->all());
        if($tag)
        {
            return new TagResource($tag);
        }
        else{
            response()->json(['error'=>'Tag Not Created'],404);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $tag=tag::find($id);
        if($tag!=null)
        return new tagResource($tag);
        else{
            response()->json(['error'=>'Tag Not Found'],404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tag $tag)
    {
        //for blade
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TagRequest $request, String $id )
    {
        $tag=tag::find($id);
        if($tag!=null)
        {
            $updated_tag= $tag->update($request->all());
            if($updated_tag)
                return new  Tagresource($tag);
        }else
        {
            response()->json(['error'=>'Tag Not Updated'],404);
        }
    }  public function replace(TagRequest $request, String $id )
{
    $tag=tag::find($id);
    if($tag!=null)
    {
        $tag_updated= $tag->update($request->all());
        if($tag_updated)
        {
            return new TagResource($tag);
        }
    }else
    {
        response()->json(['error'=>'Tag Not Updated'],404);
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)

    {
        $tag=tag::find($id);
        if($tag!=null) {
            $tag->delete();
            return new TagResource($tag);
        }


        else{
          return   response()->json(['error'=>'Tag aleardy  Deleted'],404);
        }

    }
}
