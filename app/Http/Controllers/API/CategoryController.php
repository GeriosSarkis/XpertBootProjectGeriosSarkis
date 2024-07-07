<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Http\Requests\CategoryRequest;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = category::all();
        return response()->json([
            "data" => $categories,
            "message" => "category all get",
            "status" => true,
        ]);
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
        return response()->json([
            "data" => $category,
            "message" => "category created succes ",
            "status" => true,


        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = category::find($id);
        if($category)
        {
            return response()->json([
                "data" => $category,
                "status" => true,
                "message" => "category found "
            ]);

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
            $category_update = category::update($request->all());
            return response()->json([
                "data" => $category_update,
                "status" => true,
                "message" => "categoru updated succes"

            ]);

        }
        else{
            return response()->json([

                "status" => false,
                "message" => "category not found "
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = category::find($id);
        if($category){
            $category_delete = category::destroy($id);
            return response()->json([
                "data" => $category,
                "status" => true,
                "message" => "category deleted succes",
            ]);

        }else{
            return response()->json([

                "status" => false,
                "message" => "category not found "
            ]);
        }
    }
}