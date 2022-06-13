@extends('layouts.master')
@section('title', 'Almacen')
@section('content')
<script type="text/javascript">
    var app = angular.module('ProductListModule', []);
    app.controller('ProductListController', ($scope, $http) => {
        $scope.products = [];

        angular.element(document).ready(() => {
            $http.get('/ajaxproducts').then((result) => {
                $scope.products = result.data;
            });
        });
        $scope.deleteProduct = (id) =>{
            $http.delete(`ajaxproducts/${id}`).then((result) => {
                if (result.data.result === 1) {
                    window.location.href = '/ajaxproductlist';
                }
            });
        }
    })
</script>
<div class="container" ng-app="ProductListModule" ng-controller="ProductListController">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Productos</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <a href="/ajaxnewproduct" type="button" class="btn btn-sm btn-outline-success">Crear Producto</a>
            <button type="button" class="btn btn-sm btn-outline-secondary">Imprimir Lista</button>
          </div>
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
                    # en Almacen
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
                    <input type="text" class="form-control" value="@{{ product.quantity }}">                
                </td>
                <td>
                <div class="btn-group btn-group-sm" role="group" aria-label="Basic mixed styles example">
                    <a type="button" class="btn btn-outline-warning" href="@{{ '/editproduct/' + product.id }}">Actualizar</a>
                </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@stop