<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\{ Role, Permission };

class StaffController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function home()
    {
        return view('dashboard');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index()
    {
        $role = new Role;
        $roles = $role->all();
        return view('role', ["roles" => $roles]);
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $role = new Role;
        return $role->firstOrCreate( 
            [
                'name' => $request->processRole['roleName'], 
                'description' => $request->processRole['roleName'], 
                'status' => $request->processRole['roleName']
            ]
        );
    }

        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function update(Request $request)
    {
        return $request;
        
        
        // $role = new Role;
        // return $role->firstOrCreate( 
        //     [
        //         'name' => $request->processRole['roleName'], 
        //         'description' => $request->processRole['roleName'], 
        //         'status' => $request->processRole['roleName']
        //     ]
        // );
    }


}




// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Spatie\Permission\Models\{ Role, Permission };

// class StaffController extends Controller
// {
//     /**
//      * Create a new controller instance.
//      *
//      * @return void
//      */
//     public function __construct()
//     {
//         $this->middleware('auth');
//     }


//     public function home()
//     {
//         return view('dashboard');
//     }

//     /**
//      * Create a new controller instance.
//      *
//      * @return void
//      */
//     public function index()
//     {
//         return view('role');
//     }
    
//     public function show($id)    
//     {
//         return "Showing item";
//     }
    
//     /**
//      * Show Create form
//      */
//      public function create()
//      {
//          return 'create Something';
//      }

//     /**
//      * Create a new controller instance.
//      *
//      * @return void
//      */
//     public function store($request)
//     {
//         $role = new Role;
//         return $role->firstOrCreate( 
//             ['name' => $request->role, 'description' => $request->description, 'status' => $request->status]
//         );
//     }

//     /**
//     * Editing enries
//     */
    
//     public function edit()
//     {
        
//     }

//     /*
//      * Save editied entried
//      */
     
//     public function update()
//     {
        
//     }

//     /*
//     * Delete Entries
//     */
//     public function destory()
//     {
//     }
