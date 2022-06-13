@extends('layouts.master')
@section('title', 'Nueva Venta')
@section('content')
<script type="text/javascript">
    var app = angular.module('InvoiceAddModule', []);
    app.controller('EmployeeAddController', ($scope, $http) => {
        $scope.invoiceForm = {}
        $scope.invoice = {};
        $scope.searchNit = () => {
            $http({
                url: '/ajaxcustomers', 
                method: 'GET',
                params: { nit: $scope.invoice.nit }
            }).then((result) => {
                let customers = result.data;

                if (customers.length === 0) {
                    alert('Customer does not exist');
                    return;
                }

                $scope.invoice.customerId = customers[0].id;
                $scope.invoiceForm.customerName = customers[0].firstName + ' ' + customers[0].lastName;
                $scope.invoiceForm.customerCellphone = customers[0].cellphone;
                $scope.invoiceForm.customerAddress = customers[0].address;
            })
        }
        $scope.addInvoice = () => {
            $http.post('/einvoices', $scope.invoice).then((result) => {
                if (result.data.result === 1) {
                    window.location.href = '/einvoicelist';
                }
            })
        }
    })
</script>
<div class="container" ng-app="InvoiceAddModule" ng-controller="InvoiceAddController">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Venta</h1>
    </div>    
    <div class="form-floating">
    <div>
            <form class="form-floating">
                <div>
                    <h5>Datos del Cliente</h5>
                    <div class="input-group mb-3">
                        <span class="input-group-text">NIT</span>
                        <input type="text" class="form-control" aria-label="NIT" ng-model="invoice.nit" ng-blur="searchNit()">
                        <span class="input-group-text">Cliente</span>
                        <input type="text" class="form-control" aria-label="Cliente" value="@{{ invoiceForm.customerName }}">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Celular</span>
                        <input type="text" class="form-control" aria-label="Cliente" value="@{{ invoiceForm.customerCellphone }}">
                        <span class="input-group-text">Direccion</span>
                        <input type="text" class="form-control" aria-label="Cliente" value="@{{ invoiceForm.customerAddress }}">
                    </div> 
                </div>
                <div>
                    <h5>Detalles de la Venta</h5>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Fecha</span>
                        <input type="text" class="form-control" placeholder="2022-06-11 / YY-MM-DD" aria-label="NIT" ng-model="invoice.date" >
                        <span class="input-group-text">Tipo de Pago</span>
                        <input type="text" class="form-control" placeholder="Al Contado" aria-label="Cliente" ng-model="invoice.typepayment">
                    </div>
                    <div class="input-group">
                        <span class="input-group-text">Detalles Extra</span>
                        <textarea class="form-control" aria-label="With textarea"></textarea>
                    </div>
                </div>
            </form>
        </div>
        <form class="form-floating">
        
        <div class="d-grid gap-2">
            <button class="btn btn-success" type="button" ng-click="addInvoice()">Vender</button>
        </div>
        </form>
    </div>
</div>
@stop