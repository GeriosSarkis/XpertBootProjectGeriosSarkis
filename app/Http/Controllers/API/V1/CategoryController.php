<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\V1\CategoryResource;
use App\Models\category;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = category::all();
        return CategoryResource::collection($categories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // for balde
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {

        $category = category::create($request->all());

            return new CategoryResource($category);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = category::find($id);
        if($category)
        {
            return new CategoryResource($category);

        }
    else{
        return response()->json([

            "status" => false,
            "message" => "category not found "
        ]);
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
    public function update(CategoryRequest $request, string $id)
    {
        $category = category::find($id);
        if($category)
        {
            $category_update = $category->update($request->all());
            return new CategoryResource($category);

        }
        else{
            return response()->json([

                "status" => false,
                "message" => "category not found "
            ]);
        }
    }
    public function  replace(CategoryRequest $request, string $id)
    {
        $category= category::findOrFail($id);
        if ($category) {
            $updated_category =$category->update($request->all());
            if($updated_category)
                return new CategoryResource($category);
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
        $category = category::find($id);
        if($category){
            $category_delete = category::destroy($id);
            return new CategoryResource($category);

        }else{
            return response()->json([

                "status" => false,
                "message" => "category not found "
            ]);
        }
    }
}
