<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    
    
    $role = Role::create (['name' => 'admin'  ]);
    //Role::create (['name' => 'writer' ]);

    //Permission::create (['name' => 'write articles'   ]);
    //Permission::create (['name' => 'delete articles'  ]);
    //Permission::create (['name' => 'edit articles'    ]);


    //$admin -> syncPermissions   ($write, $delete, $edit);
    //$write -> syncRoles         ($writer); 

    }
}
