@extends('layouts.master')
@section('title', 'Deproal')
@section('content')
<script type="text/javascript">
    var app = angular.module('DashListModule', []);
        app.controller('DashListController', ($scope, $http) => {
        $scope.products = [];

        angular.element(document).ready(() => {
                $http.get('/ajaxproducts').then((result) => {
                    $scope.products = result.data;
                });
            });
            $scope.customers = [];

        angular.element(document).ready(() => {
            $http.get('/ajaxcustomers').then((result) => {
                $scope.customers = result.data;
            });
        });
            $scope.employees = [];

            angular.element(document).ready(() => {
                $http.get('/ajaxemployees').then((result) => {
                    $scope.employees = result.data;
                });
            });
    })
</script>
<div class="container" ng-app="DashListModule" ng-controller="DashListController">

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom" id="productos">
        <h1 class="h2" id="productos">Productos</h1>
        </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>
                    Producto
                </th>
                <th>
                    Variante
                </th>
                <th>
                    Categoria
                </th>
                <th>
                    Descripcion
                </th>
                <th>
                    Stock
                </th>
                
                
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="product in products">
                <td>
                    @{{ product.name }}
                </td>
                <td>
                    @{{ product.subname }}
                </td>
                <td>
                    @{{ product.category }}
                </td>
                <td>
                    @{{ product.description }}
                </td>
                <td>
                    @{{ product.quantity }}
                </td>
                
            </tr>
        </tbody>
    </table>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom" id="productos">
        <h1 class="h2" id="contactos">Empleados</h1>
        </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>
                    Nombre
                </th>
                <th>
                    Cargo
                </th>
                <th>
                    Zona
                </th>
                <th>
                    Celular
                </th>
                <th>

                </th>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="employee in employees">
                <td>
                    @{{ employee.firstName }}
                </td>
                <td>
                    @{{ employee.charge }}
                </td>
                <td>
                    Cochabamba
                </td>
                <td>
                    @{{ employee.cellphone }}
                </td>
                <th>
                  <a type="button" class="btn btn-outline-success" href="https://api.whatsapp.com/send?phone=591@{{ employee.cellphone }}&text=Buenas,%20necesito%20ayuda%20con%20la%20compra%20de%20productos" target="_blank">WhatsApp</a>
                </th>
            </tr>
        </tbody>
    </table>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Clientes</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <a href="/ajaxnewcustomer" type="button" class="btn btn-sm btn-outline-success">Registrar Cliente</a>
          </div>
        </div>
</div>
<table class="table table-striped">
        <thead>
            <tr>
                <th>
                    NIT
                </th>
                <th>
                    Nombres
                </th>
                <th>
                    Apellidos
                </th>
                <th>
                    Direccion
                </th>
                <th>
                    Deuda
                </th>
                <th>
                    Cellphone
                </th>
                <th>
                    
                </th>
                
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="customer in customers">
                <td>
                    @{{ customer.nit }}
                </td>
                <td>
                    @{{ customer.firstName }}
                </td>
                <td>
                    @{{ customer.lastName }}
                </td>
                <td>
                    @{{ customer.address }}
                </td>
                <td>
                    @{{ customer.debt }}
                </td>
                <td>
                    @{{ customer.cellphone }}
                </td>
                <td>
                <div class="btn-group btn-group-sm" role="group" aria-label="Basic mixed styles example">
                    <a type="button" class="btn btn-outline-success" href="https://api.whatsapp.com/send?phone=591@{{ customer.cellphone }}" target="_blank">WhatsApp</a>

                    
                </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@stop
