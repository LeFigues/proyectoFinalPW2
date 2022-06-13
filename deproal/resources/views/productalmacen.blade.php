@extends('layouts.master')
@section('title', 'Almacen')
@section('content')
<script type="text/javascript">
    var app = angular.module('ProductListModule', []);
    app.controller('ProductListController', ($scope, $http) => {
        $scope.products = [];

        angular.element(document).ready(() => {
            $http.get('/productsalmacen').then((result) => {
                $scope.products = result.data;
            });
        });
        $scope.deleteProduct = (id) =>{
            $http.delete(`productsalmacen/${id}`).then((result) => {
                if (result.data.result === 1) {
                    window.location.href = '/productalmacen';
                }
            });
        }
    })
</script>
<div class="container" ng-app="ProductListModule" ng-controller="ProductListController">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Almacen</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
</div>
<table class="table table-striped">
        <thead>
            <tr>
                <th>
                    Foto
                </th>
                <th>
                    Producto
                </th>
                <th>
                    Variante
                </th>
                <th>
                    Cantidad en Stock
                </th>
                <th>
                    
                </th>
                
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="product in products">
                <td>
                    @{{ product.photo }}
                </td>
                <td>
                    @{{ product.name }}
                </td>
                <td>
                    @{{ product.subname }}
                </td>
                <td>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" value="@{{ product.quantity }}" ng-model="product.quantity" aria-describedby="button-addon2">
                    <button class="btn btn-outline-success" type="button" id="button-addon2">Actualizar</button>
                </div>
                </td>
                <td>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@stop