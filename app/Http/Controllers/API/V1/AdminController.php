<?php

namespace app\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Http\Resources\V1\AdminResource;
use App\Http\Resources\V1\CategoryResource;
use App\Models\Admin;


class AdminController extends Controller
{

    public function index()
    {
        $admin = Admin::all();
        return AdminResource::collection($admin);

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
        $admin = Admin::create($request->all());
        return  new AdminResource($admin);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $admin = Admin::find($id);


        if($admin!=null)
        return new AdminResource($admin);
        else {

            return response()->json(["message" => "No Admin Found"], 200);
        }

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
        $admin = Admin::find($id);
        if ($admin) {
            $admin_updated = $admin->update($request->all());
            return new AdminResource($admin);
        }
        else{
            return response()->json([

                "status" => false,
                "message" => "category not found "
            ]);
        }
    }    public function  replace(AdminRequest $request, string $id)
{
    $admin= Admin::findOrFail($id);
    if ($admin) {
        $updat_admin =$admin->update($request->all());
        if($updat_admin)
            return new CategoryResource($admin);
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
        $admin = Admin::find($id);
        if ($admin) {
            $delete = Admin::destroy($admin->id);
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
