<?php

namespace App\Http\Controllers;

use App\Models\EasyInvoice;
use App\Models\EasyInvoiceDetail;
use Exception;
use Illuminate\Http\Request;
use DB;

class EasyInvoiceController extends Controller
{
    public function showEasyInvoiceList() {
        return view('einvoicelist');
    }

    public function showNewEasyInvoice() {
        return view('einvoicenew');
    }

    public function getEasyInvoiceById($id) {
        return EasyInvoice::find($id);
    }

    public function getEasyInvoices(Request $req) {
        $criteria = [];

        if ($req->nit) {
            array_push($criteria, ['nit', $req->nit]);
        }

        return EasyInvoice::where($criteria)->get();
    }

    public function postEasyInvoice(Request $request) {
        try {
            DB::beginTransaction();
            
            $invoiceNumber = EasyInvoice::max('invoice_number') + 1;

            $requestData = $request->all();
            $invoice = EasyInvoice::create([
                'invoiceNumber' => $invoiceNumber,
                'invoiceDate' => $requestData['invoiceDate'],
                'invoiceLocation' => $requestData['invoiceLocation'],
                'invoiceTotal' => $requestData['invoiceTotal'],
                'employee' => $requestData['employee'],
                'customer' => $requestData['customer'],
                'nit' => $requestData['nit'],
                'cellphone' => $requestData['cellphone'],
                'invoiceInfo' => $requestData['invoiceInfo'],
                'invoiceTypePayment' => $requestData['invoiceTypePayment'],
            ]);

            foreach ($request->invoiceDetails as $invoiceDetail) {
                EasyInvoiceDetail::create([
                    'productId' => $invoiceDetail['productId'],
                    'invoiceId' => $invoice->id,
                    'quantity' => $invoiceDetail['quantity']
                ]);
            }

            DB::commit();
            return ['result' => 1];
        } catch(Exception $ex) {
            DB::rollback();
            
        return ['result' => $ex];
        }

    }

    public function putEasyInvoice(Request $request) {
        try {
            DB::beginTransaction();

            $requestData = $request->all();
            

            $invoice = EasyInvoice::find($requestData['id']);
            $invoice->invoiceNumber = $requestData['invoiceNumber'];
            $invoice->invoiceDate = $requestData['invoiceDate'];
            $invoice->invoiceLocation = $requestData['invoiceLocation'];
            $invoice->invoiceTotal = $requestData['invoiceTotal'];
            $invoice->employee = $requestData['employee'];
            $invoice->customer = $requestData['customer'];
            $invoice->nit = $requestData['nit'];
            $invoice->cellphone = $requestData['cellphone'];
            $invoice->invoiceInfo = $requestData['invoiceInfo'];
            $invoice->invoiceTypePayment = $requestData['invoiceTypePayment'];
            
            $invoiceDetail = EasyInvoiceDetail::find($invoice->invoiceNumber);
            $invoiceDetail->quantity = $requestData['quantity'];

            $invoiceDetail->save();

            $invoice->save();
            DB::commit();
            return ['result' => 1];
        } catch (Exception $e) {
            DB::rollback();
            return ['result' => $e];
        }

        
    }
    public function deleteEasyInvoice($id){
        try{
            DB::beginTransaction();
            $invoiceDetail = EasyInvoiceDetail::find($id);
            $invoice = EasyInvoice::find($invoiceDetail->invoiceNumber);

            $invoiceDetail->delete();
            $invoice->delete();
            DB::commit();
            return ['result' => 1];   

        } catch(Exception $e){
            DB::rollback();
            return ['result' => 0];   
        }
     

    }
    public function editEasyInvoice($id){
        return view('einvoiceedit');
    }
}
