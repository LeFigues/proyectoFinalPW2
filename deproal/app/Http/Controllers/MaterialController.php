<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;
use Exception;
use DB;

class MaterialController extends Controller
{
    public function showMaterialList() {
        return view('materiallist');
    }

    public function showNewMaterial() {
        return view('materialnew');
    }

    public function getMaterialById($id) {
        return Material::find($id);
    }

    public function getMaterials(Request $req) {
        $criteria = [];

        if ($req->name) {
            array_push($criteria, ['name', $req->name]);
        }

        return Material::where($criteria)->get();
    }

    public function postMaterial(Request $request) {
        try {
            DB::beginTransaction();
            $requestData = $request->all();

            Material::create([
                'name' => $requestData['name'],
                'subname' => $requestData['subname'],
                'category' => $requestData['category'],
                'location' => $requestData['location'],
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

    public function putMaterial(Request $request) {
        try {
            DB::beginTransaction();

            $requestData = $request->all();

            $material = Material::find($requestData['id']);
            $material->name = $requestData['name'];
            $material->subname = $requestData['subname'];
            $material->category = $requestData['category'];
            $material->location = $requestData['location'];
            $material->photo = $requestData['photo'];
            $material->quantity = $requestData['quantity'];
            
            $material->save();
         

            DB::commit();

            return ['result' => 1];
        } catch (Exception $e) {
            return ['result' => $e];
            DB::rollback();
        }

        
    }
    public function deleteMaterial($id){
        try{
            DB::beginTransaction();
            $material = Material::find($id);

            $material->delete();
            DB::commit();
            return ['result' => 1];   

        } catch(Exception $e){
            DB::rollback();
            return ['result' => 0];   
        }
     

    }
    public function editMaterial($id){
        return view('materialedit');
    }
}
