<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use DB;

class AjaxProductController extends Controller
{
    public function showProductList() {
        return view('angularproductlist');
    }
    public function showProductAlmacen() {
        return view('productalmacen');
    }

    public function showNewProduct() {
        return view('angularnewproduct');
    }

    public function getProductById($id) {
        return Product::find($id);
    }

    public function getProducts(Request $req) {
        $criteria = [];

        if ($req->name) {
            array_push($criteria, ['name', $req->name]);
        }

        return Product::where($criteria)->get();
    }
    public function getProductsAlmacen(Request $req) {
        $criteria = [];

        if ($req->name) {
            array_push($criteria, ['name', $req->name]);
        }

        return Product::where($criteria)->get();
    }

    public function postProduct(Request $request) {
        try {
            DB::beginTransaction();
            $requestData = $request->all();

            Product::create([
                'name' => $requestData['name'],
                'subname' => $requestData['subname'],
                'category' => $requestData['category'],
                'price' => $requestData['price'],
                'description' => $requestData['description'],
                'photo' => $requestData['photo'],
                'quantity' => $requestData['quantity']
            ]);

            DB::commit();
            return ['result' => 1];
        } catch(Exception $ex) {
            DB::rollback();
            
        return ['result' => $ex];
        }

    }

    public function putProduct(Request $request) {
        try {
            DB::beginTransaction();

            $requestData = $request->all();

            $product = Product::find($requestData['id']);
            $product->name = $requestData['name'];
            $product->subname = $requestData['subname'];
            $product->category = $requestData['category'];
            $product->price = $requestData['price'];
            $product->description = $requestData['description'];
            $product->photo = $requestData['photo'];
            $product->quantity = $requestData['quantity'];
            
            $product->save();
         

            DB::commit();
            return ['result' => 1];

        } catch (Exception $e) {
            DB::rollback();
            return ['result' => $e];
        }

        
    }
    public function deleteProduct($id){
        try{
            DB::beginTransaction();
            $product = Product::find($id);

            $product->delete();
            DB::commit();
            return ['result' => 1];   

        } catch(Exception $e){
            DB::rollback();
            return ['result' => 0];   
        }
     

    }
    public function editProduct($id){
        return view('angulareditproduct');
    }
}