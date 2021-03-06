<?php

namespace App\Http\Controllers;

use App\models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('authCheck', ['except' => ['index', 'show', 'search_category']]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image_file = $request->all();
        dd($image_file);
        $image = new Image();
        $image->product_id = $request->id;


        if ($request->hasFile('image')) {
            $img = $request->image;
            if (File::exists($image->image)) {
                $image_path = $image->image;
                File::delete($image_path);
            }
            $imagename = Storage::disk('public')->put('products', $img);
            $imgArr = explode('/', $imagename);
            $image_name = $imgArr[1];
            $image->image = '/storage/products/' . $image_name;
            $image->save();
            return $image;
        }
        return 'error';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return $request->image;
        $image_file = $request->all();
        dd($image_file);
        $image = new Image();
        $image->product_id = $id;


        if ($request->hasFile('image')) {
            $img = $request->image;
            if (File::exists($image->image)) {
                $image_path = $image->image;
                File::delete($image_path);
            }
            $imagename = Storage::disk('public')->put('products', $img);
            $imgArr = explode('/', $imagename);
            $image_name = $imgArr[1];
            $image->image = '/storage/products/' . $image_name;
            $image->save();
            return $image;
        }
        return 'error';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function images(Request $request, $id)
    {
        $image_file = $request->all();
        // dd($image_file);
        $image = new Image();


        if ($request->hasFile('image')) {
            $img = $request->image;
            if (File::exists($image->image)) {
                $image_path = $image->image;
                File::delete($image_path);
            }
            $imagename = Storage::disk('public')->put('products', $img);
            $imgArr = explode('/', $imagename);
            $image_name = $imgArr[1];

            $images_upload = Image::firstOrCreate(
                [
                    'display' => true,
                    'product_id' => $id,
                ],
                [
                    'image' => '/storage/products/' . $image_name
                ]
            );



            // $image->display = true;
            // $image->product_id = $id;
            // $image->image = '/storage/products/' . $image_name;
            // $image->save();
            return $images_upload;
        }
        return 'error';
    }
}
