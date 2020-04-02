<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Seller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    /**
     * Show the Seller dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return Seller::paginate(500);
    }

    public function search($search)
    {
        return Seller::where('name', 'LIKE', "%{$search}%")->paginate(500);
    }

    public function store(Request $request)
    {
        $seller = new Seller();
        $seller->name = $request->name;
        $seller->email = $request->email;
        $seller->county = $request->county;
        $seller->town = $request->town;
        $seller->password = bcrypt('password');
        $seller->phone = $request->phone;
        $seller->postal = $request->postal;
        $seller->contact_person = $request->contact_person;
        $seller->contact_phone = $request->contact_phone;
        $seller->contact_email = $request->contact_email;
        $seller->save();
    }
}
