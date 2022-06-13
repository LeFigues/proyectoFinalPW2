@extends('layouts.master')
@section('title', 'Nuevo Material')
@section('content')
<script type="text/javascript">
    var app = angular.module('MaterialAddModule', []);
    app.controller('MaterialAddController', ($scope, $http) => {
        $scope.material = {};
        $scope.addMaterial = () => {
            $http.post('/materials', $scope.material).then((result) => {
                console.log(result);

                if (result.data.result === 1) {
                    window.location.href = '/materiallist';
                    console.log("work2");

                }
            });
        }
    })
</script>
<div class="container" ng-app="MaterialAddModule" ng-controller="MaterialAddController">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Registro de Material</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <a href="/materiallist" type="button" class="btn btn-sm btn-outline-warning">Lista de Materiales</a>
            <button type="button" class="btn btn-sm btn-outline-secondary">Imprimir Material</button>
          </div>
        </div>
</div>    
<div class="form-floating">
    <form class="form-floating">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="txtFirstName" ng-model="material.name">
            <label for="txtFirstName">Nombre del Material</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="txtLastName" ng-model="material.subname">
            <label for="txtLastName">Variante</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="txtNit" ng-model="material.category">
            <label for="txtNit">Categoria</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="txtQuantity" ng-model="material.location">
            <label for="txtQuantity">Locacion</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="txtCellphone" ng-model="material.quantity">
            <label for="txtCellphone">Cantidad</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="txtInfo" ng-model="material.photo">
            <label for="txtInfo">Photo</label>
        </div>
        <div class="d-grid gap-2">
            <button class="btn btn-success" type="button" ng-click="addMaterial()">Registrar Material</button>
        </div>
    </form>
</div>
</div>
@stop