<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Models\SalePoint;
use Exception;

class SalePointController extends Controller
{
    public function showSalePointList() {
        return view('salepointlist');
    }

    public function showNewSalePoint() {
        return view('salepointnew');
    }

    public function getSalePointById($id) {
        return SalePoint::find($id);
    }

    public function getSalePoints(Request $req) {
        $criteria = [];

        if ($req->nit) {
            array_push($criteria, ['name', $req->name]);
        }

        return SalePoint::where($criteria)->get();
    }

    public function postSalePoint(Request $request) {
        try {
            DB::beginTransaction();

            $requestData = $request->all();

            SalePoint::create([
                'name' => $requestData['name'],
                'photo' => $requestData['photo'],
                'cellphone' => $requestData['cellphone'],
                'type' => $requestData['type'],
                'info' => $requestData['info'],
                'address' => $requestData['address']
            ]);
            DB::commit();
            return ['result' => 1];

        } catch(Exception $ex) {
            DB::rollback();
            return ['result' => $ex];
        }

    }
    

    public function putSalePoint(Request $request) {
        try {
            DB::beginTransaction();

            $requestData = $request->all();
            $salepoint = SalePoint::find($requestData['id']);

            $salepoint->name = $requestData['name'];
            $salepoint->photo = $requestData['photo'];
            $salepoint->cellphone = $requestData['cellphone'];
            $salepoint->type = $requestData['type'];
            $salepoint->info = $requestData['info'];
            $salepoint->address = $requestData['address'];
            
            $salepoint->save();

            DB::commit();
            return ['result' => 1];
        } catch (Exception $ex) {
            DB::rollback();
        }

        return ['result' => 0];
    }
    public function editSalePoint($id){
        return view('salepointedit');
    }
    public function deleteSalePoint($id){
        try{
            DB::beginTransaction();
            $salepoint = SalePoint::find($id);

            $salepoint->delete();
            DB::commit();
            return ['result' => 1];   

        } catch(Exception $e){
            DB::rollback();
            return ['result' => 0];   
        }
     

    }
}
