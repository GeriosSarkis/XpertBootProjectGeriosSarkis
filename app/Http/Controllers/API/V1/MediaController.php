<?php

namespace app\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\MediaRequest;
use App\Http\Resources\MediaResouce;
use App\Models\media;
use Illuminate\Http\Request;


class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $media=media::all();
        return MediaResouce::collection($media);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // for blade
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MediaRequest $request)
    {
        $media = media::create($request->all());
        return new MediaResouce($media);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $media=media::find($id);

        if($media!=null){
            return new MediaResouce($media);
        }else{
            response()->json(["message"=>"Media not found"],404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //for balde

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MediaRequest $request, string $id)
    {
        $media = media::find($id);
        if($media)
        {
            $update_media = $media->update($request->all());
            return new MediaResouce($media);

        } else{
            return response()->json([

                "status" => false,
                "message" => "media not found "
            ]);
        }

    }public function  replace(MediaRequest $request, string $id)
{
    $media= media::findOrFail($id);
    if ($media) {
        $update_posts =$media->update($request->all());
        if($update_posts)
            return new MediaResouce($media);
        else{
            return \response()->json([

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
    public function destroy(string $id )
    {
        $media = media::find($id);
        if($media)
        {
            $media_to_delete = media::destroy($media->id);
            return new MediaResouce($media);
        }
        else{
            return response()->json([

                "status" => false,
                "message" => "media not found "
            ]);
        }
    }
}
