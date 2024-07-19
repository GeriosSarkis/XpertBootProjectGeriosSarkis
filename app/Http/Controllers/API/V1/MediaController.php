<?php

namespace app\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\MediaRequest;
use App\Models\media;
use Illuminate\Http\Request;
use function App\Http\Controllers\API\response;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $media=media::all();
        return response()->json(
            [
                "data" => $media,
                "message" => "all media get",
                "status" => true,

            ]
        );
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
        return response()->json(
            [
            "data" => $media,
            "message" => "media createtd suuccfuly",
            "status" => true
        ]
    );

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
            return response()->json([

                "data" => $update_media,
                "message" => "media updated succes ",
                "status" => true

            ]);

        } else{
            return response()->json([

                "status" => false,
                "message" => "media not found "
            ]);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $media = media::find($id);
        if($media)
        {
            $media_to_delete = media::destroy($media->id);
            return response()->json([
                "data"=>$media,

                "status" => true,
                "message" => "delteted suuces",

            ]);
        }
        else{
            return response()->json([

                "status" => false,
                "message" => "media not found "
            ]);
        }
    }
}
