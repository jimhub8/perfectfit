<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use App\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SchoolController extends Controller
{
    public function __construct()
    {
        $this->middleware('authCheck', ['except' => ['index', 'show', 'search_school']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return School::paginate(100);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        if (Auth::guard('admin')->check()) {
            $user_id = Auth::guard('admin')->id();
        }
        if (Auth::guard('school')->check()) {
            $user_id = Auth::guard('school')->id();
        }
        $school = new School;
        $school->user_id = $user_id;
        $school->name = $request->name;
        $school->email = $request->email;
        $school->password = bcrypt('password');
        $school->county = $request->county;
        $school->town = $request->town;
        $school->gender = $request->gender;
        $school->phone = $request->phone;
        $school->postal = $request->postal;
        $school->contact_person = $request->contact_person;
        $school->contact_phone = $request->contact_phone;
        $school->contact_email = $request->contact_email;
        $school->image = $request->image;
        $school->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return $request->all();
        $school = School::find($id);
        $school->name = $request->name;
        $school->email = $request->email;
        $school->password = bcrypt('password');
        $school->county = $request->county;
        $school->town = $request->town;
        $school->gender = $request->gender;
        $school->phone = $request->phone;
        $school->postal = $request->postal;
        $school->contact_person = $request->contact_person;
        $school->contact_phone = $request->contact_phone;
        $school->contact_email = $request->contact_email;
        $school->image = $request->image;
        $school->menus()->sync($request->menus);
        $school->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search_school($search)
    {
        return School::where('name', 'LIKE', "%{$search}%")->paginate(100);
    }
}
