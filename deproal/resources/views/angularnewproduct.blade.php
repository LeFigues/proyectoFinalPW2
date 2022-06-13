@extends('layouts.master')
@section('title', 'Nuevo Producto')
@section('content')
<script type="text/javascript">
    var app = angular.module('ProductAddModule', []);
    app.controller('ProductAddController', ($scope, $http) => {
        $scope.product = {};
        $scope.addProduct = () => {
            $http.post('/ajaxproducts', $scope.product).then((result) => {
                console.log(result);

                if (result.data.result === 1) {
                    window.location.href = '/ajaxproductlist';
                    console.log("work2");

                }
            });
        }
    })
</script>
<div class="container" ng-app="ProductAddModule" ng-controller="ProductAddController">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Registro de Producto</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <a href="/ajaxproductlist" type="button" class="btn btn-sm btn-outline-warning">Lista de Productos</a>
            <button type="button" class="btn btn-sm btn-outline-secondary">Imprimir Producto</button>
          </div>
        </div>
</div>    
<div class="form-floating">
    <form class="form-floating">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="txtFirstName" ng-model="product.name">
            <label for="txtFirstName">Nombre del Producto</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="txtLastName" ng-model="product.subname">
            <label for="txtLastName">Variante</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="txtNit" ng-model="product.category">
            <label for="txtNit">Categoria</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="txtQuantity" ng-model="product.quantity">
            <label for="txtQuantity">Stock en Almacen</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="txtCellphone" ng-model="product.price">
            <label for="txtCellphone">Precio</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="txtDebt" ng-model="product.description">
            <label for="txtDebt">Descripcion</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="txtInfo" ng-model="product.photo">
            <label for="txtInfo">Photo</label>
        </div>
        <div class="d-grid gap-2">
            <button class="btn btn-success" type="button" ng-click="addProduct()">Registrar Producto</button>
        </div>
    </form>
</div>
</div>
@stop