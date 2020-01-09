<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\{Permission, Role};

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $roles  = Role::all();

        if($request->ajax())
        {
            return Permission::orderBy('name')->get(['id','name']);
        }

        return view('permissions.manager', ['roles'=> $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['sometimes','unique:permissions,name'],
            'permissions' => ['required','array'],
            'role' => ['required']
        ]);

        $name = $request->name;
        $permissions = $request->permissions;
        $permission_full_name = null;

        if($name)
        {
            $permission_full_name = $name.'-';
        }

        $permissions_list = [];
        foreach($permissions as $permission)
        {
            $permission_name = ($permission_full_name) ? $permission_full_name.$permission :  $permission;
            Permission::firstorCreate(['name' => $permission_name]);

            $permissions_list[] = $permission_name;
        }

        $role = Role::findorFail($request->role);
        $role->syncPermissions($permissions_list);
        return response()->json(['success' => true,'msg' => 'Permissions has been attached to role.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
