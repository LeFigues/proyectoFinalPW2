<?php

namespace App\Http\Controllers;

use App\Models\WebInfo;
use Exception;
use Illuminate\Http\Request;

class WebInfoController extends Controller
{
    public function putWebInfo(Request $request) {
        try {
            DB::beginTransaction();

            $requestData = $request->all();

            $webinfo = WebInfo::find($requestData['id']);
            $webinfo->catname = $requestData['catname'];
            $webinfo->fondo = $requestData['fondo'];
            $webinfo->imghistory = $requestData['imghistory'];
            $webinfo->history = $requestData['history'];
            $webinfo->carrousel1 = $requestData['carrousel1'];
            $webinfo->carrousel1text = $requestData['carrousel1text'];
            $webinfo->carrousel2 = $requestData['carrousel2'];
            $webinfo->carrousel2text = $requestData['carrousel2text'];
            $webinfo->carrousel3 = $requestData['carrousel3'];
            $webinfo->carrousel3text = $requestData['carrousel3text'];
            $webinfo->select1 = $requestData['select1'];
            $webinfo->select2 = $requestData['select2'];
            $webinfo->select3 = $requestData['select3'];
            
            $webinfo->save();
         

            DB::commit();
            return ['result' => 1];

        } catch (Exception $e) {
            DB::rollback();
            return ['result' => $e];
        }
    }
    public function getWebInfoById($id) {
        return WebInfo::find(0);
    }

    public function editWebInfo($id){
        return view('webinfoedit');
    }
}
