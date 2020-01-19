<?php



namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;

class UsersController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()

    {
        $users = User::all();
        return view('admin.users.index',['user_list' => $users]);
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

    public function edit($id)

    {

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

        $this->validate($request, [

            'user_name' => 'required|max:120',

            'email' => 'required|email|unique:users,email,' . $id,

            'roles' => 'required'

        ]);



        $user = User::findorFail($id);





        $roles = $request->input("roles");

        $user->roles()->sync($roles);







        return redirect()->route('users.index')->with('flash_message','User successfully edited.');

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
