@extends('layouts.master')
@section('title', 'Edit Employee')
@section('content')
<script type="text/javascript">
    var app = angular.module('ProductEditModule', []);
    app.controller('ProductEditController', ($scope, $http) => {
        $scope.product = {};
        angular.element(document).ready(function(){
            let url = window.location.href;
            let chars = url.split('/');
            let id = chars[chars.length - 1];

            $http.get(`/ajaxproducts/${id}`).then((result) => {
                $scope.product = result.data;
                console.log(result)
            });
        });
        

        $scope.putProduct = () => {
            $http.put('/ajaxproducts', $scope.product).then((result) => {
                console.log(result);
                if (result.data.result === 1) {
                    window.location.href = '/ajaxproductlist';
                }
            });
        }
    })
</script>
<div class="container" ng-app="ProductEditModule" ng-controller="ProductEditController">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Editar Producto</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <a href="/ajaxproductlist" type="button" class="btn btn-sm btn-outline-warning">Lista de Productos</a>
            <button type="button" class="btn btn-sm btn-outline-secondary">Imprimir Detalles del Producto</button>
          </div>
        </div>
</div>    
<div class="form-floating">
    <form class="form-floating">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="txtFirstName" ng-model="product.name">
            <label for="txtFirstName">Producto</label>
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
            <input type="text" class="form-control" id="txtNit" ng-model="product.quantity">
            <label for="txtNit">Stock en Almacen</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="txtCellphone" ng-model="product.price">
            <label for="txtCellphone">Precio</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="txtAddress" ng-model="product.description">
            <label for="txtAddress">Descripcion</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="txtBirthDate" ng-model="product.photo">
            <label for="txtBirthDate">Foto</label>
        </div>
        <div class="d-grid gap-2">
            <button class="btn btn-success" type="button" ng-click="putProduct()">Guardar Cambios</button>
        </div>
    </form>
</div>
</div>
@stop