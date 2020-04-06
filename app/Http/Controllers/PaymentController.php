<?php

namespace App\Http\Controllers;

use App\Mail\ThankYou;
use App\models\Ordershipping;
use App\models\Shippingaddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Cart;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function shipping($address)
    {
        // dd($address);
        $shippingaddress = Shippingaddress::firstOrCreate(
            ['user_id' => Auth::id()],
            [
                'name' => (array_key_exists('name', $address)) ?$address['name'] : null,
                'street_address' => (array_key_exists('street_address', $address)) ?$address['street_address'] : null,
                'town' => (array_key_exists('town', $address)) ? $address['town'] : $address['county'] ,
                'country' => (array_key_exists('country', $address)) ?$address['country'] : null,
                'county' => (array_key_exists('county', $address)) ?$address['county'] : null,
                'postal_code' => (array_key_exists('postal_code', $address)) ?$address['postal_code'] : null,
                'phone' => (array_key_exists('phone', $address)) ?$address['phone'] : null,
                'email' => (array_key_exists('email', $address)) ?$address['email'] : null,
            ]
        );
        return $shippingaddress->id;
    }


    public function shipping_2($address)
    {
        dd('swdw');
        $shippingaddress = Shippingaddress::firstOrCreate(
            ['user_id' => Auth::id()],
            [
                'name' => $address->name,
                'street_address' => $address->street_address,
                'town' => $address->town,
                'country' => $address->country,
                'county' => $address->county,
                'postal_code' => $address->postal_code,
                'phone' => $address->phone,
                'email' => $address->email,
            ]
        );
        return $shippingaddress->id;
    }

    public function cash_delivery(Request $request)
    {
        // return Auth::id();
        // return $request->all();


        if (Auth::check()) {
            if (Auth::user()->shipping) {
                $address = Auth::user()->shipping;
            } else {
                $address = $request->all();
                foreach ($address as  $value) {
                    unset($address['payment']);
                    unset($address['billing']);
                    unset($address['shipping']);
                }
            }
            $shipping_id = $this->shipping($address);
        }
        // return $shipping_id;


        // if (Auth::guard('admin')->check()) {
        //     $admin_id = Auth::guard('admin')->id;
        // }

        // if (Auth::guard('seller')->check()) {
        //     $seller_id = Auth::guard('seller')->id;
        // }

        if (!Auth::guard('seller')->check()  && !Auth::guard('admin')->check()  && !Auth::check()) {
            abort(401, 'please login');
        }



        // dd($this->getCart());
        $cart_same = new SaleController;
        $cart = $this->getCart();
        // return $cart;

        $sale_id = $cart_same->sale($cart, 'Cash on delivery', null);

        Ordershipping::firstOrCreate(
            ['sale_id' => $sale_id],
            [
                'shippingaddress_id' => $shipping_id,
            ]
        );
        // Cart::clear();

        return;
    }
    public function getCart()
    {
        return Cart::getContent();
    }
    public function returngetCart()
    {
        // dd(Session::get('cart'));
        if (Session::has('cart')) {
            $carts = Session::get('cart');
            $cartA = [];
            foreach ($carts->items as $itemsC) {
                $cartA[] = $itemsC;
            }
            return ($cartA);
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new Cart($oldCart);
            return $cart->getCart();
        } else {
            return;
        }

        // Get Total if coupons

    }
}
