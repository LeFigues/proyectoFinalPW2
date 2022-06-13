<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use DB;

class ClientController extends Controller
{
    public function showProductList() {
        return view('showproductlist');
    }
    public function getProducts(Request $req) {
        $criteria = [];

        if ($req->name) {
            array_push($criteria, ['name', $req->name]);
        }

        return Product::where($criteria)->get();
    }
}
