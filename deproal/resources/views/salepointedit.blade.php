@extends('layouts.master')
@section('title', 'Editar Punto de Venta')
@section('content')
<script type="text/javascript">
    var app = angular.module('SalePointEditModule', []);
    app.controller('SalePointEditController', ($scope, $http) => {
        $scope.salepoint = {};
        angular.element(document).ready(function(){
            let url = window.location.href;
            let chars = url.split('/');
            let id = chars[chars.length - 1];

            $http.get(`/salepoints/${id}`).then((result) => {
                $scope.salepoint = result.data;
                console.log(result)
            });
        });
        

        $scope.putSalePoint = () => {
            $http.put('/salepoints', $scope.salepoint).then((result) => {
                console.log(result);
                if (result.data.result === 1) {
                    window.location.href = '/salepointlist';
                }
            });
        }
    })
</script>
<div class="container" ng-app="SalePointEditModule" ng-controller="SalePointEditController">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Editar Punto de Venta</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <a href="/salepointlist" type="button" class="btn btn-sm btn-outline-warning">Puntos de Venta</a>
            <button type="button" class="btn btn-sm btn-outline-secondary">Imprimir Detalles del Punto de Venta</button>
          </div>
        </div>
</div>    
<div class="form-floating">
    <form class="form-floating">
    <div class="form-floating mb-3">
            <input type="text" class="form-control" id="txtFirstName" ng-model="salepoint.name">
            <label for="txtFirstName">Nombre del Punto de Venta</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="txtFirstName" ng-model="salepoint.type">
            <label for="txtFirstName">El lugar es</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="txtCellphone" ng-model="salepoint.cellphone">
            <label for="txtCellphone">Celular</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="txtInfo" ng-model="salepoint.info">
            <label for="txtInfo">Info</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="txtAddress" ng-model="salepoint.address">
            <label for="txtAddress">Direccion</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="txtBirthDate" ng-model="salepoint.photo">
            <label for="txtBirthDate">Maps</label>
        </div>
        <div class="d-grid gap-2">
            <button class="btn btn-success" type="button" ng-click="putSalePoint()">Guardar Cambios</button>
        </div>
    </form>
</div>
</div>
@stop