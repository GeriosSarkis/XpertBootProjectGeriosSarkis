<?php

namespace app\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\AdminResource;
use App\Http\Resources\CategoryResource;
use App\Models\admin;
use App\Models\category;
use Illuminate\Http\Request;


class AdminController extends Controller
{

    public function index()
    {
        $admin = admin::all();
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
        $admin = admin::create($request->all());
        return  new AdminResource($admin);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $admin = admin::find($id);


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
        $admin = admin::find($id);
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
    $admin= admin::findOrFail($id);
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
