<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\User;
use App\Http\Resources\UserResource;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $users = User::with('permissions')->orderBy('name')->get();

        if($request->ajax())
        {
            return UserResource::collection($users);
        }
         return view('users.users');
    }



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        $title = "User Create";

        $roles = Role::all();

        return view('admin.users.create',["title" => $title,"roles" => $roles,"user_create" => true]);

    }



    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {

        $this->validate($request, [

            'user_name'=>'required|max:120',

            'email'=>'required|email|unique:users,email,'.$request->input("email"),

        ]);



        return redirect()->route('users.index')->with('flash_message','User created successfully.');

    }



    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {

        $title = "User Editing";

        $roles = Role::all();

        return view('admin.users.create',["title" => $title,"roles" => $roles]);

    }



    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit(Request $request, $id)

    {
        return $request;
        $title = "User Editing";

        $user = User::findOrFail($id); //Get user with specified id

        $roles = Role::get(); //Get all roles



        return view('admin.users.edit', compact('user', 'roles'))->with(["title" => $title,"user_edit" => true]);

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
        $rules = [];

        if($request->name){
            $rules['name'] = ['required','unique:users,name'];
        }elseif($request->email){
            $rules['email'] = ['required','unique:users,email']; 
        }elseif($request->status){
            $rules['status'] = ['required'];
        }
         
        $request->validate($rules);
        $role = User::findorFail($id);
        $input = $request->except(['url','method','csrfToken']);
        $role->fill($input)->save();

        return response()->json(['success' => true,'msg' => 'User updated']);
    }



    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('flash_message','User successfully deleted.');
    }

}
