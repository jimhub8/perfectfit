<?php

namespace App\Http\Controllers;

use App\models\Menu;
use App\models\SchoolMenu;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
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
        return Menu::paginate(500);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $menu = new Menu;
        $menu->menu = $request->menu;
        $menu->user_id = $this->logged_user()->id;
        $menu->save();
        return $menu;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Menu::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $menu = Menu::find($id);
        $menu->menu = $request->menu;
        $menu->save();
        return $menu;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function menu_image(Request $request, $id)
    {
        // dd($request->image);
        $upload = Menu::find($id);
        if ($request->hasFile('image')) {
            $img = $request->image;
            // dd($upload->image);
            if (File::exists($upload->image)) {
                // return ('test');
                $image_path = $upload->image;
                File::delete($image_path);
            }
            $imagename = Storage::disk('public')->put('menus', $img);
            // return ('noop');
            $imgArr = explode('/', $imagename);
            $image_name = $imgArr[1];
            $upload->image = '/storage/menus/' . $image_name;
            $upload->save();
            return $upload;
        }
    }

    public function search_menu(Request $request, $search)
    {
        $school = $request->school;
        $school_menu = SchoolMenu::where('school_id', $school)->get('menu_id');

        $menu_id = [];
        foreach ($school_menu as $menu) {
            $menu_id[] = $menu->menu_id;
        }


        return Menu::where('menu', 'Like', "%{$search}%")->whereIn('id', $menu_id)->paginate(300);
    }
}
