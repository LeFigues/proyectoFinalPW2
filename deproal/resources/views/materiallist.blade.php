@extends('layouts.master')
@section('title', 'Lista de Materiales')
@section('content')
<script type="text/javascript">
    var app = angular.module('MaterialListModule', []);
    app.controller('MaterialListController', ($scope, $http) => {
        $scope.materials = [];

        angular.element(document).ready(() => {
            $http.get('/materials').then((result) => {
                $scope.materials = result.data;
            });
        });
        $scope.deleteMaterial = (id) =>{
            $http.delete(`materials/${id}`).then((result) => {
                if (result.data.result === 1) {
                    window.location.href = '/materiallist';
                }
            });
        }
    })
</script>
<div class="container" ng-app="MaterialListModule" ng-controller="MaterialListController">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Materiales</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <a href="/materialnew" type="button" class="btn btn-sm btn-outline-success">Crear Material</a>
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
                    Material
                </th>
                <th>
                    Variante
                </th>
                <th>
                    Categoria
                </th>
                <th>
                    Locacion
                </th>
                <th>
                    Cantidad
                </th>
                <th>
                    
                </th>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="material in materials">
                <td>
                    @{{ material.photo }}
                </td>
                <td>
                    @{{ material.name }}
                </td>
                <td>
                    @{{ material.subname }}
                </td>
                <td>
                    @{{ material.category }}
                </td>
                <td>
                    @{{ material.location }}
                </td>
                <td>
                    @{{ material.quantity }}
                </td>
                <td>
                <div class="btn-group btn-group-sm" role="group" aria-label="Basic mixed styles example">
                    <a type="button" class="btn btn-outline-warning" href="@{{ '/materialedit/' + material.id }}">Editar</a>
                    <button type="button" class="btn btn-outline-danger" ng-click="deleteMaterial(material.id)">Eliminar</button>
                </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@stop