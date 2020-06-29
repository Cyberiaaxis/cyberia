<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\{Role, Permission};
use Hash;
use Carbon\Carbon;
use App\{ User, house};
use App\Http\Resources\UserResource;
use App\Model\TravelRoute;
use App\Model\UserTravel;
use Auth;

class UsersController extends Controller
{
    /**
     * Instantiate a new UserController instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the users.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::with('permissions')->orderBy('name')->get();
        if($request->ajax())
        {
            return UserResource::collection($users);
        }

    return view('staff.users.users');
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|max:120',
            'gender'=>'required',
            'type'=>'required',
            'password'=>'required',
            'email'=>'required|email|unique:users,email',
            'roles'=>"required|array",
        ]);
        $password = Hash::make($request->password);
        $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $password,
                'gender'=> $request->gender,
                'type'=> $request->type,
            ]);
        $user->syncRoles($request->roles);
    return response()->json(['success' => true,'msg' => 'User has been created.']);
    }

    /**
     * Display the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, User $profile)
    {
        $now =  Carbon::now();
    return view('player.profile', ['user' => $profile, 'currentdatetime' => $now]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $roles = Role::all();
        $user = User::findorFail($id);
    return view('staff.users.edit', ['user' => $user, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request, int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|max:120',
            'email'=>'required|email|exists:users,email',
            'roles'=>"required|array",
            'type'=>'required',
            'gender'=>'required',
        ]);
        $user = User::findorFail($id);
        $input = $request->except(['url','method','csrfToken', 'roles']);
        $user->fill($input)->save();
        $user->syncRoles($request->roles);
    return response()->json(['success' => true,'msg' => 'User has been updated']);
    }

    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
    return response()->json(['success' => true,'msg' => 'User has been deleted']);
    }

    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getUser($id)
    {

    }

    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addTravel($destination)
    {
        // $travelroute = new TravelRoute();
        // $travelroute->getTravelRoute($origin, $destination);
        $userTravel = new UserTravel();
        $userTravel->addTravel(auth()->user()->id, $destination);


    }



}
