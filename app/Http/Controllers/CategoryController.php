<?php

namespace App\Http\Controllers;

use App\models\Category;
use App\models\Menu;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('authCheck', ['except' => ['index', 'show', 'search_category', 'filter_category']]);
    }


    public function logged_user()
    {
        $user = new User();
        return  $user->logged_user();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Category::paginate(500);
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
        $category = new Category;
        $category->category = $request->category;
        $category->menu_id = $request->menu_id;
        $category->user_id = $this->logged_user()->id;;
        $category->save();
        return $category;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Category::find($id);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->category = $request->category;
        $category->save();
        return $category;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();

    }

    public function search_category(Request $request, $search)
    {
        $school = $request->school;
        return Category::where('category', 'Like', "%{$search}%")->paginate(300);
    }

    public function filter_category(Request $request)
    {
        // return $request->all();
        $school_id = $request->school['id'];
        $menu_id = $request->menus['id'];
        // dd($school_id, $menu_id);
        return Menu::find($menu_id)->categories;
    }
}
