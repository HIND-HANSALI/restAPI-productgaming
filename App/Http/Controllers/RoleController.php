<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return response()->json([
            'status' => 'success',
            'roles' => $roles
        ]);
    }

   

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        $role = Role::create($request->all());
        return response()->json([
            'status' => 'true',
            'message' => 'Role created successfully!',
            'role' => $role
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        // $role = Role::find($id);
        if(!$role){
            return response()->json(['message' => 'This role doesn\'t exist']);
        }
        return response()->json($role, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Role updated successfully',
            'role' => $role,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        // if(!$role){
        //     return response()->json([
        //         'message' => 'role not found',
        //     ], 404);
        // }
    
        $role->delete();
    
        return response()->json([
            'status' => true,
            'message' => 'role deleted successfully!'
        ], 200);

               
    }
}
