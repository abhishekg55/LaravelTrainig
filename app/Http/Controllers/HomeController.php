<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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
        // auth()->user()->givePermissionTo('edit post');
        // auth()->user()->assignRole('writer');
        // Role::create(['name' => 'Editor']);
        // Role::create(['name' => 'Admin']);
        // Permission::create(['name' => 'create post']);
        // Permission::create(['name' => 'delete post']);

        return view('home');
    }
}
