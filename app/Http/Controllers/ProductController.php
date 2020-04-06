<?php

namespace App\Http\Controllers;

use App\models\AutoGenerate;
use App\models\Category;
use App\models\CategoryProduct;
use App\models\Product;
use App\models\Sku;
use App\User;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('authCheck', ['except' => ['index', 'show', 'product_image', 'filter_products', 'product_search']]);
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
        // return Product::all();
        // return $products = Product::paginate(10);
        $products = Product::with('images')->paginate(10);
        return $this->transform_product($products);
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
        // return $request->categories['id'];
        if (Auth::guard('admin')->check()) {
            $seller_id = $request->seller_id;
        }
        if (Auth::guard('seller')->check()) {
            $seller_id = Auth::guard('seller')->id();
        }

        $product = new Product();
        // $product->description = $request->description;
        $product->product_name = $request->product_name;
        $product->category_id = $request->categories['id'];
        $product->school_id = $request->school_id;
        $product->user_id = $this->logged_user()->id;
        $product->seller_id = $seller_id;
        $sku_no = new AutoGenerate;
        $product->sku_no = $sku_no->product_sku();
        $product->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $products = Product::where('id', $id)->first();
        // $$products = $this->transform_product($products);
        return $$products[0];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return $request->all();
        $sku_values = $request->sku_values;
        $product = $request->product;
        // return $request->product['subcategories'];
        Sku::updateOrCreate(
            [
                'sku_no' => $product['sku_no'],
            ],
            [
                'price' => $sku_values['price'],
                'quantity' => $sku_values['quantity'],
                'product_id' => $id,
                'reorder_point' => $sku_values['reorder_point'],
            ]
        );

        // $relation = new VariantController;
        // $update_product = Product::find($id);
        // $this->menu_fun($request->product['menus'], $update_product);
        // $relation->category_fun($request->product['categories'], $update_product);
        // $relation->subcategory_fun($request->product['subcategories'], $update_product);
        // $relation->brand_fun($request->product['brands'], $update_product);
        // return $update_product;
        return 'success';
    }

    public function menu_fun($menus, $update_product)
    {
        $menu_sync_id = [];
        foreach ($menus as  $category) {
            $menu_sync_id[] = $category['id'];
        }
        $update_product->menus()->sync($menu_sync_id);
        return;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
    }

    public function product_image(Request $request, $id)
    {
        // dd($request->image);
        $upload = Product::find($request->id);
        if ($request->hasFile('image')) {
            $img = $request->image;
            // dd($upload->image);
            if (File::exists($upload->image)) {
                // return ('test');
                $image_path = $upload->image;
                File::delete($image_path);
            }
            $imagename = Storage::disk('public')->put('products', $img);
            // return ('noop');
            $imgArr = explode('/', $imagename);
            $image_name = $imgArr[1];
            $upload->image = env('APP_URL') . '/storage/products/' . $image_name;
            $upload->save();
            return $upload;
        }
    }

    public function product_search($search)
    {
        return Product::where('product_name', 'LIKE', "%{$search}%")
            // ->orWhere('product_barcode', 'LIKE', "%{$search}%")
            // ->orWhere('description', 'LIKE', "%{$search}%")
            ->paginate(100);
    }

    public function transform_product($products)
    {

        $products->transform(function ($product) {
            if (!empty($product->skus)) {
                $product->price = $product->skus->price;
                $product->quantity = $product->skus->quantity;
            }

            $images = $product->images;
            foreach ($images as $image) {
                if ($image['display']) {
                    $product->image = ($image['image']);

                }
            }

            // foreach ($product->images as  $pro_image) {
            //     if ($pro_image->display) {
            //         $product->image = $pro_image->image;
            //     }
            // }
            return $product;
        });
        return $products;
    }


    public function product_table()
    {
        // return Product::all();
        // return $products = Product::paginate(10);
        $products = Product::paginate(500);
        return $this->transform_display_product($products);
    }


    public function transform_display_product($products)
    {
        $products->transform(function ($product) {
            // dd($product->skus);
            foreach ($product->images as  $pro_image) {
                if ($pro_image->display) {
                    $product->image = $pro_image->image;
                }
            }
            // dd(count($product->product_variants));
            if (count($product->skus) > 0) {
                if (count($product->skus) > 1) {
                    $prices = [];
                    $quantity = 0;
                    foreach ($product->skus as  $pro_price) {
                        // dd($pro_price['price']);
                        $prices[] = $pro_price['price'];
                        $quantity += $pro_price['quantity'];
                    }
                    $product->price = 'from ' . min($prices);
                    $product->quantity = $quantity;
                } else {
                    foreach ($product->skus as  $pro_price) {
                        // dd($pro_price['price']);
                        $prices = $pro_price['price'];
                        $quantity = $pro_price['quantity'];
                    }
                    $product->price = $prices;
                    $product->quantity = $quantity;
                }
                // dd(($product->skus[0]->price));
                // $product->quantity = $product->skus[0]->quantity;
            } else {
                $product->price = 0;
                $product->quantity = 0;
            }
            $product->variants = count($product->skus);
            $product->discount = 0;


            // if ($product->categories) {
            //     foreach ($product->categories as  $category) {
            //         foreach ($category->discounts as  $discount) {
            //             if ($discount->discount_unit == 'percentage') {

            //             }
            //             // dd($discount->discount_unit);
            //         }
            //     }
            // }



            // $product->sku_no = 'test_123';
            return $product;
        });
        return $products;
    }

    public function filter_products(Request $request)
    {
        // return $request->all();
        $school = $request->school['id'];
        $menus = $request->menus;
        $menu_id = [];
        foreach ($menus as  $menu) {
            $menu_id[] = $menu['id'];
        }
        $categories = Category::whereIn('menu_id', $menu_id)->get('id');
        // return $category_id;
        $category_id = [];
        foreach ($categories as  $category) {
            $category_id[] = $category['id'];
        }

        $product = Product::whereIn('category_id', $category_id)->where('school_id', $school)->paginate();
        return  $this->transform_product($product);
    }
}
