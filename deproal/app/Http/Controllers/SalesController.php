<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;


class SalesController extends Controller
{
    public function showCustomerList() {
        return view('sales');
    }
    public function getCustomers(Request $req) {
        $criteria = [];

        if ($req->nit) {
            array_push($criteria, ['nit', $req->nit]);
        }

        return Customer::where($criteria)->get();
    }
}
