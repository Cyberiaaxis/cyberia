<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\{Attack, User, UserCrime, UserDetail, UserRealEstate, UserSlot, UserStats};
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
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $user,
              $userDetail,
              $userStats,
              $userSlots,
              $userRealEstate,
              $attacks;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->user = new User();
        $this->userDetail = new UserDetail();
        $this->userStats = new UserStats();
        $this->userSlots = new UserSlot();
        $this->userRealEstate = new UserRealEstate();
        $this->attacks = new Attack();
        $this->userCrimes = new UserCrime();
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
        $this->user->getConnection()->beginTransaction();

        try {
            $this->user  = $this->user->addUser($request);
            $this->userDetail->addUserDetails($this->user->id);
            $this->userStats->addUserStats($this->user->id);
            $this->userSlots->addUserSlots($this->user->id);
            $this->userRealEstate->addUserRealEstate($this->user->id, 1);
            $this->userCrimes->addCrimeRecords($this->user->id);
            $this->attacks->addAttackRecods($this->user->id);
            $this->user->getConnection()->commit();
        } catch (Throwable $e) {
            $this->user->getConnection()->rollback();
            report($e);
            $e->getMessage();
            return abort(500, $e);
        }
    return $this->user;
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
