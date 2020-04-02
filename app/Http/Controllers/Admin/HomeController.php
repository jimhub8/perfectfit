<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    protected $redirectTo = '/admin/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('admin.auth:admin');
    }

    /**
     * Show the Seller dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        if (Auth::guard('admin')->check() || Auth::guard('seller')->check()) {
            if (Auth::guard('admin')->check()) {
                Auth::guard('admin')->user();
            }
            if (Auth::guard('seller')->check()) {
                $auth_user = Auth::guard('seller')->user();
            }
        return view('vendor.multiauth.admin.home');
        } else {
            return redirect('/admin/login');
        }

        // return view('vendor.multiauth.admin.home');
    }

}
