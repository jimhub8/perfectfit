<?php

namespace App\Http\Controllers;

use Bitfumes\Multiauth\Model\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        if (Auth::guard('admin')->check() || Auth::guard('seller')->check()) {
            if (Auth::check()) {
                $auth_user = Auth::user();
                $auth_user->is_admin = false;
                $auth_user->is_user = true;
                $auth_user->is_seller = false;
            }
            if (Auth::guard('admin')->check()) {
                foreach (Permission::all() as $permission) {
                    if (Auth::guard('admin')->user()->can($permission->name)) {
                        $permissions[$permission->name] = true;
                    } else {
                        $permissions[$permission->name] = false;
                    }
                }
                $auth_user = Auth::guard('admin')->user();
                $auth_user->is_admin = true;
                $auth_user->is_user = false;
                $auth_user->is_seller = false;
                $auth_user = Arr::prepend($auth_user->toArray(), $permissions, 'can');
            }
            if (Auth::guard('seller')->check()) {
                $auth_user = Auth::guard('seller')->user();
                $auth_user->is_user = false;
                $auth_user->is_admin = false;
                $auth_user->is_seller = true;
            }
            return view('vendor.multiauth.admin.home', compact('auth_user'));
        } else {
            return redirect('/admin/login');
        }

        // return view('vendor.multiauth.admin.home');
    }




    public function perfectfit()
    {
        if (Auth::check() || Auth::guard('seller')->check() || Auth::guard('admin')->check()) {
            if (Auth::guard('admin')->check()) {
                foreach (Permission::all() as $permission) {
                    if (Auth::guard('admin')->user()->can($permission->name)) {
                        $permissions[$permission->name] = true;
                    } else {
                        $permissions[$permission->name] = false;
                    }
                }
                $auth_user = Auth::guard('admin')->user();
                $auth_user->is_admin = true;
                $auth_user->is_user = false;
                $auth_user->is_seller = false;
                $auth_user = Arr::prepend($auth_user->toArray(), $permissions, 'can');
            }
            if (Auth::guard('seller')->check()) {
                $auth_user = Auth::guard('seller')->user();
                $auth_user->is_admin = false;
                $auth_user->is_client = false;
                $auth_user->is_seller = true;
            }
            if (Auth::guard('web')->check()) {
                $auth_user = Auth::user();
                $auth_user->is_admin = false;
                $auth_user->is_seller = false;
                $auth_user->is_client = true;
            }
            return view('welcome', compact('auth_user'));
        } else {
            return view('welcome');
        }

        // return view('vendor.multiauth.admin.home');
    }
}
