<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\RoleResource;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roles = Role::with('permissions')->orderBy('name')->get();

        if($request->ajax())
        {
            return RoleResource::collection($roles);
        }

        return view('roles.role');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
            'name' => ['required','unique:roles,name'],  'description' => ['required'],  'status' => ['required','integer']
        ]);

        $role = Role::firstorCreate([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status
        ]);

        return response()->json(['success' => true, 'status' => true, 'msg' => 'Role created successfully','role' => $role]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $role = Role::findorFail($id);
       return view('operations.operations',['role' => $role]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::findorFail($id);

        if($request->ajax())
        {
            return $role->permissions;
        }

        $request->validate([
            'name' => ['required','exists:permissions,name']
        ]);

        $permission = $request->input('name');

        $permission = Permission::findByName($permission);

        $role->revokePermissionTo($permission);

        return response()->json(['success' => true,'msg' => 'Permission has been revoked from Role']);
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
        // return $request;
        $rules = [];

        if($request->name){
            $rules['name'] = ['required','unique:roles,name'];
        }elseif($request->description){
            $rules['description'] = ['required']; 
        }elseif($request->status){
            $rules['status'] = ['required'];
        }
         
        $request->validate($rules);
        $role = Role::findorFail($id);
        $input = $request->except(['url','method','csrfToken']);
        $role->fill($input)->save();

        return response()->json(['success' => true,'msg' => 'Role updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::findorFail($id);
        $role->delete($id);
      return response()->json(['success' => true, 'msg' => 'Role has been deleted']);
    }
}