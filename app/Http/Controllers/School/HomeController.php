<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    protected $redirectTo = '/school/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('school.auth:school');
    }

    /**
     * Show the School dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('school.home');
    }

}