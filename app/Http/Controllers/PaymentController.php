<?php

namespace App\Http\Controllers;

use App\Mail\ThankYou;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Cart;
use App\models\Product;

class PaymentController extends Controller
{

    public function cash_delivery(Request $request)
    {
        // return $request->all();
        // dd($this->getCart());
        $cart_same = new SaleController;
        $cart = $this->getCart();
        // return $cart;

        $res = $cart_same->sale($cart, 'Cash on delivery', null);
        return $res;
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
