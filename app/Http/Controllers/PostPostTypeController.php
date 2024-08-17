<?php

namespace App\Http\Controllers;

use App\Models\_PostType;
use App\Models\PostType;
use Illuminate\Http\Request;

class PostPostTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post_types=PostType::all();
        return $post_types;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(_PostType $post_PostType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(_PostType $post_PostType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, _PostType $post_PostType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(_PostType $post_PostType)
    {
        //
    }
}
