@extends('layouts.master')
@section('title', 'Editar Cliente')
@section('content')
<script type="text/javascript">
    var app = angular.module('CustomerEditModule', []);
    app.controller('CustomerEditController', ($scope, $http) => {
        $scope.customer = {};
        angular.element(document).ready(function(){
            let url = window.location.href;
            let chars = url.split('/');
            let id = chars[chars.length - 1];

            $http.get(`/ajaxcustomers/${id}`).then((result) => {
                $scope.customer = result.data;
                console.log(result)
            });
        });

        $scope.putCustomer = () => {
            $http.put('/ajaxcustomers', $scope.customer).then((result) => {
                if (result.data.result === 1) {
                    window.location.href = '/ajaxcustomerlist';
                }
            });
        }
    })
</script>
<div class="container" ng-app="CustomerEditModule" ng-controller="CustomerEditController">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Editar Cliente</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <a href="/ajaxcustomerlist" type="button" class="btn btn-sm btn-outline-warning">Lista de Clientes</a>
            <button type="button" class="btn btn-sm btn-outline-secondary">Imprimir Cliente</button>
          </div>
        </div>
</div>    
<div class="form-floating">
    <form class="form-floating">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="txtFirstName" ng-model="customer.firstName">
            <label for="txtFirstName">Nombres</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="txtLastName" ng-model="customer.lastName">
            <label for="txtLastName">Apellidos</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="txtNit" ng-model="customer.nit">
            <label for="txtNit">NIT</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="txtCellphone" ng-model="customer.cellphone">
            <label for="txtCellphone">Celular</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="txtDebt" ng-model="customer.debt">
            <label for="txtDebt">Deuda</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="txtInfo" ng-model="customer.info">
            <label for="txtInfo">Info</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="txtAddress" ng-model="customer.address">
            <label for="txtAddress">Direccion</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="txtBirthDate" ng-model="customer.birthDate">
            <label for="txtBirthDate">Fecha de Nacimiento</label>
        </div>
        <div class="d-grid gap-2">
            <button class="btn btn-success" type="button" ng-click="putCustomer()">Registrar Cliente</button>
        </div>
    </form>
</div>
</div>
@stop