<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class StaffController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function home(Request $request)
    {

        if($request->ajax())
        {
            return response()->json(['role' => Role::orderBy('name')->get()]);
        }

        return view('dashboard');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $roles = Role::orderBy('name')->get();

        return view('role',['roles' => $roles]);
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
            'name' => ['required','unique:roles,name'],  'desc' => ['required'],  'status' => ['required','integer']
        ]);

        $role = Role::firstorCreate([
            'name' => $request->input('name'),
            'description' => $request->input('desc'),
            'status' => $request->input('status')
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
        // return $request;
        $rules = [];

        if($request->input('name')){
            $rules['name'] = ['required','unique:roles,name'];
        }elseif($request->input('description')){
            $rules['description'] = ['required']; 
        }elseif($request->input('status')){
            $rules['status'] = ['required'];
        }
         
        $request->validate($rules);
        $role = Role::findorFail($id);
        $input = $request->except(['url','method','csrfToken']);
        $role->fill($input)->save();

        return response()->json(['success' => true,'msg' => 'role updated']);
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

        return response()->json(['success' => true,'msg' => 'Role has been deleted']);
    }
}