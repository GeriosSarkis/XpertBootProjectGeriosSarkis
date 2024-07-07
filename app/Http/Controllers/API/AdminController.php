<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin;
use App\Http\Requests\AdminRequest;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = admin::all();
        return response()->json([
            "data" => $admin,
            "message" => "admin get all",
            "status" => true,
        ]);

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
    public function store(AdminRequest $request)
    {
        $admin = admin::create($request->all());
        return response()->json([
            "data" => $admin,
            "message" => "admin create succcees",
            "status" => true,

        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $admin = admin::findOrFailind($id);
        return response()->json([
            "status" => true,
            "data" => $admin,
            "message" => "get adminn scucces",
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //for blade
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminRequest $request, string $id)
    {
        $admin = admin::update($request->all());
        return response()->json([
            "data" => $admin,
            "status" => true,
            "message" => "admin updated succces "

        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $admin = admin::find($id);
        if ($admin) {
            $delete = admin::destroy($admin->id);
            return response()->json([
                "data"=>$admin,
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