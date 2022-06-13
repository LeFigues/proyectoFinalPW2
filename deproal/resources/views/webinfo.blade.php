@extends('layouts.master')
@section('title', 'Editar Informacion de la WEB')
@section('content')
<script type="text/javascript">
    var app = angular.module('WebInfoEditModule', []);
    app.controller('WebInfoEditController', ($scope, $http) => {
        $scope.webinfo = {};
        angular.element(document).ready(function(){
            let url = window.location.href;
            let chars = url.split('/');
            let id = chars[chars.length - 1];

            $http.get(`/webinfo/${id}`).then((result) => {
                $scope.webinfo = result.data;
                console.log(result)
            });
        });
        

        $scope.putWebInfo = () => {
            $http.put('/webinfo', $scope.webinfo).then((result) => {
                console.log(result);
                if (result.data.result === 1) {
                    window.location.href = '/webinfo/{0}';
                }
            });
        }
    })
</script>
<div class="container" ng-app="WebInfoEditModule" ng-controller="WebInfoEditController">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Editar Producto</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <a href="/webinfo/0" type="button" class="btn btn-sm btn-outline-warning">Informacion de Web</a>
          </div>
        </div>
</div>    
<div class="form-floating">
    <form class="form-floating">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="txtname" ng-model="webinfo.catname">
            <label for="txtname">name</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="txtfondo" ng-model="webinfo.fondo">
            <label for="txtfondo">Fondo Inicial</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="txtimgh" ng-model="webinfo.imghistory">
            <label for="txtimgh">Imagen de Historia</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="txth" ng-model="webinfo.history">
            <label for="txth">Texto Historia</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="txtcar1" ng-model="webinfo.carrousel1">
            <label for="txtcar1">Img Carrousel 1</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="txtcar1t" ng-model="webinfo.carrousel1text">
            <label for="txtcar1t">Texto Carrousel 1</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="txtcar2" ng-model="webinfo.carrousel2">
            <label for="txtcar2">Img Carrousel 2</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="txtcar2t" ng-model="webinfo.carrousel2text">
            <label for="txtcar2t">Texto Carrousel 2</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="txtcar3" ng-model="webinfo.carrousel3">
            <label for="txtcar3">Img Carrousel 3</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="txtcar3t" ng-model="webinfo.carrousel3text">
            <label for="txtcar3t">Texto Carrousel 3</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="txtselect1" ng-model="webinfo.select1">
            <label for="txtselect1">Producto 1</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="txtselect2" ng-model="webinfo.select2">
            <label for="txtselect2">Producto 2</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="txtselect3" ng-model="webinfo.select2">
            <label for="txtselect3">Producto 3</label>
        </div>
        <div class="d-grid gap-2">
            <button class="btn btn-success" type="button" ng-click="putWebInfo()">Guardar Cambios</button>
        </div>
    </form>
</div>
</div>
@stop