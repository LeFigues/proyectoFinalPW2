<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxEmployeeController;
use App\Http\Controllers\AjaxProductController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EasyInvoiceController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\SalePointController;
use App\Http\Controllers\WebInfoController;
use App\Models\SalePoint;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('/editcustomer/{id}',[App\Http\Controllers\AjaxCustomerController::class, 'editCustomer'])->middleware('auth');
Route::get('/ajaxcustomerlist', [App\Http\Controllers\AjaxCustomerController::class, 'showCustomerList'])->middleware('auth')->name('ajaxcustomerslist');
Route::get('/ajaxnewcustomer', [App\Http\Controllers\AjaxCustomerController::class, 'showNewCustomer'])->middleware('auth');
Route::get('/ajaxcustomers', [App\Http\Controllers\AjaxCustomerController::class, 'getCustomers'])->middleware('auth');
Route::get('/ajaxcustomers/{id}', [App\Http\Controllers\AjaxCustomerController::class, 'getCustomerById'])->middleware('auth');
Route::post('/ajaxcustomers', [App\Http\Controllers\AjaxCustomerController::class, 'postCustomer'])->middleware('auth');
Route::put('/ajaxcustomers', [App\Http\Controllers\AjaxCustomerController::class, 'putCustomer'])->middleware('auth');
Route::delete('/ajaxcustomers/{id}', [App\Http\Controllers\AjaxCustomerController::class, 'deleteCustomer'])->middleware('auth');

Route::get('/employees', 'App\Http\Controllers\EmployeeController@getEmployees')->middleware('auth');
Route::get('/newemployee', 'App\Http\Controllers\EmployeeController@showNewEmployee')->middleware('auth');
Route::post('/employees', 'App\Http\Controllers\EmployeeController@postEmployee');

Route::get('/editemployee/{id}',[AjaxEmployeeController::class, 'editEmployee'])->middleware('auth');
Route::get('/ajaxemployeelist', [AjaxEmployeeController::class, 'showEmployeeList'])->middleware('auth')->name('ajaxemployeeslist');
Route::get('/ajaxnewemployee', [AjaxEmployeeController::class, 'showNewEmployee'])->middleware('auth');
Route::get('/ajaxemployees', [AjaxEmployeeController::class, 'getEmployees'])->middleware('auth');
Route::get('/ajaxemployees/{id}', [AjaxEmployeeController::class, 'getEmployeeById'])->middleware('auth');
Route::post('/ajaxemployees', [AjaxEmployeeController::class, 'postEmployee'])->middleware('auth');
Route::put('/ajaxemployees', [AjaxEmployeeController::class, 'putEmployee'])->middleware('auth');
Route::delete('/ajaxemployees/{id}', [AjaxEmployeeController::class, 'deleteEmployee'])->middleware('auth');

#Ventas-----------------------------------------------------------------------------------------------------------
Route::get('/newsale/{nit}', [SalesController::class, 'showNewSaleByNit']);

Route::get('/ventas', [App\Http\Controllers\InvoiceController::class, 'showNewInvoice']);
Route::get('/invoices/{id}', [App\Http\Controllers\InvoiceController::class, 'getInvoice']);
Route::post('/ventas', [App\Http\Controllers\InvoiceController::class, 'postInvoice']);

Route::get('/einvoiceedit/{id}',[EasyInvoiceController::class, 'editEasyInvoice'])->middleware('auth');
Route::get('/einvoicelist', [EasyInvoiceController::class, 'showEasyInvoiceList'])->middleware('auth')->name('einvoiceslist');
Route::get('/einvoicenew', [EasyInvoiceController::class, 'showNewEasyInvoice'])->middleware('auth');
Route::get('/einvoices', [EasyInvoiceController::class, 'getEasyInvoices'])->middleware('auth');
Route::get('/einvoices/{id}', [EasyInvoiceController::class, 'getEasyInvoiceById'])->middleware('auth');
Route::post('/einvoices', [EasyInvoiceController::class, 'postEasyInvoice'])->middleware('auth');
Route::put('/einvoices', [EasyInvoiceController::class, 'putEasyInvoice'])->middleware('auth');
Route::delete('/einvoices/{id}', [EasyInvoiceController::class, 'deleteEasyInvoice'])->middleware('auth');

#Product-------------------------------------------------------------------------------------------------------------
Route::get('/products', [App\Http\Controllers\ProductController::class, 'getProducts'])->middleware('auth');

Route::get('/editproduct/{id}',[AjaxProductController::class, 'editProduct'])->middleware('auth');

Route::get('/productsalmacen', [AjaxProductController::class, 'getProductsAlmacen'])->middleware('auth');
Route::get('/productalmacen', [AjaxProductController::class, 'showProductAlmacen'])->middleware('auth')->name('productalmacen');
Route::get('/ajaxproductlist', [AjaxProductController::class, 'showProductList'])->middleware('auth')->name('ajaxproductslist');
Route::get('/ajaxnewproduct', [AjaxProductController::class, 'showNewProduct'])->middleware('auth');
Route::get('/ajaxproducts', [AjaxProductController::class, 'getProducts'])->middleware('auth');
Route::get('/ajaxproducts/{id}', [AjaxProductController::class, 'getProductById'])->middleware('auth');
Route::post('/ajaxproducts', [AjaxProductController::class, 'postProduct'])->middleware('auth');
Route::put('/ajaxproducts', [AjaxProductController::class, 'putProduct'])->middleware('auth');
Route::delete('/ajaxproducts/{id}', [AjaxProductController::class, 'deleteProduct'])->middleware('auth');

Route::get('/sales', [SalesController::class, 'getCustomers'])->middleware('auth');
Route::get('/salescustomerlist', [SalesController::class, 'showCustomerList'])->middleware('auth')->name('salescustomerslist');

#Web Info ------------------------------------------------------------------------------------------------------------------------
Route::get('/webinfo/{id}', [WebInfoController::class, 'getWebInfoById'])->middleware('auth');
Route::put('/webinfo', [WebInfoController::class, 'putWebInfo'])->middleware('auth');


# Cliente
Route::get('/newclientregister', [App\Http\Controllers\AjaxCustomerController::class, 'showNewClientCustomer']);
Route::post('/clientregister', [App\Http\Controllers\AjaxCustomerController::class, 'postClientCustomer']);
Route::get('/showproducts', [ShowController::class, 'getProducts'])->middleware('auth');

#Material
Route::get('/materiallist', [MaterialController::class, 'showMaterialList'])->middleware('auth')->name('materiallist');
Route::get('/materialnew', [MaterialController::class, 'showNewMaterial'])->middleware('auth');
Route::get('/materials', [MaterialController::class, 'getMaterials'])->middleware('auth');
Route::get('/materials/{id}', [MaterialController::class, 'getMaterialById'])->middleware('auth');
Route::post('/materials', [MaterialController::class, 'postMaterial'])->middleware('auth');
Route::put('/materials', [MaterialController::class, 'putMaterial'])->middleware('auth');
Route::delete('/materials/{id}', [MaterialController::class, 'deleteMaterial'])->middleware('auth');
Route::get('/materialedit/{id}',[MaterialController::class, 'editMaterial'])->middleware('auth');

#Puntos de Venta-------------------------------------------------------------------------------------------
Route::get('/salepointedit/{id}',[SalePointController::class, 'editSalePoint'])->middleware('auth');
Route::get('/salepointlist', [SalePointController::class, 'showSalePointList'])->middleware('auth')->name('salepointlist');
Route::get('/salepointnew', [SalePointController::class, 'showNewSalePoint'])->middleware('auth');
Route::get('/salepoints', [SalePointController::class, 'getSalePoints'])->middleware('auth');
Route::get('/salepoints/{id}', [SalePointController::class, 'getSalePointById'])->middleware('auth');
Route::post('/salepoints', [SalePointController::class, 'postSalePoint'])->middleware('auth');
Route::put('/salepoints', [SalePointController::class, 'putSalePoint'])->middleware('auth');
Route::delete('/salepoints/{id}', [SalePointController::class, 'deleteSalePoint'])->middleware('auth');


