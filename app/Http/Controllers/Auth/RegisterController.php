<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Model\{UserDetail, User, UserStats};
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Hash, Validator};
use Throwable;

class RegisterController extends Controller

{

    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $request
     * @return \Illuminate\Contracts\Validation\Validator
     */

    protected function validator($request)
    {
        return Validator::make($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  $request
     * @return \App\User
     */
    protected function create($request)
    {
        $user = new User();
        $user->getConnection()->beginTransaction();

        try {
            $addedUser  = $this->addUser($request);
            $this->addUserDetails($addedUser->id);
            $this->addUserStats($addedUser->id);
            $user->getConnection()->commit();
        } catch (Throwable $e) {
            $user->getConnection()->rollback();
            return abort(404);
        }
    return $addedUser;
    }

    /**
     * add a new user instance after a valid registration.
     *
     * @param  array  $request
     * @return \App\User
     */
    protected function addUser($request){
        $user = new User();
        return $user->create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
    }

    /**
     * Create a new userDetails instance after a valid registration.
     *
     * @param  array  $userIda
     * @return \App\User
     */
    protected function addUserDetails($userId)
    {
        $userdetail = new UserDetail();
        return $userdetail->create([
            'user_id' => $userId,
            'jail' => 0,
            'money' => 100,
            'hospital' => 0,
            'points' => 10,
            'rank_id' => 1,
            'level_id' => 1,
            'location_id'  => 1,
        ]);
    }

    /**
     * Create a new userstats instance after a valid registration.
     *
     * @param  $userId
     * @return \App\User
     */
    protected function addUserStats($userId)
    {
        $userstats = new UserStats();
        return $userstats->create([
            'user_id' => $userId,
            'strength' => 100,
            'defense' => 100,
            'agility' => 100,
            'endurance' => 100,
            'hp' => 100,
            'max_hp' => 100,
            'energy' => 10,
            'max_energy' => 10,
            'nerve' => 10,
            'max_nerve' => 10,
            'will' => 100,
            'max_will' => 100,
        ]);
    }

    /**
     * Chceck Email exists
     */
    public function checkemail(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);
    return response()->json(['success' => true]);
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        return response()->json(['success' => "Register SuccessFull"]);
    }
}
