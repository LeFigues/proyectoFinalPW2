@extends('layouts.master')
@section('title', 'Puntos de Venta')
@section('content')
<script type="text/javascript">
    var app = angular.module('SalePointListModule', []);
    app.controller('SalePointListController', ($scope, $http) => {
        $scope.salepoints = [];

        angular.element(document).ready(() => {
            $http.get('/salepoints').then((result) => {
                $scope.salepoints = result.data;
            });
        });
        $scope.deleteSalePoint = (id) =>{
            $http.delete(`salepoints/${id}`).then((result) => {
                if (result.data.result === 1) {
                    window.location.href = '/salepointlist';
                }
            });
        }
    })
</script>
<div class="container" ng-app="SalePointListModule" ng-controller="SalePointListController">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Puntos de Venta</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <a href="/salepointnew" type="button" class="btn btn-sm btn-outline-success">Registrar Punto de Venta</a>
            <button type="button" class="btn btn-sm btn-outline-secondary">Imprimir Lista</button>
          </div>
        </div>
</div>
<table class="table table-striped">
        <thead>
            <tr>
                <th>
                    Nombre
                </th>
                <th>
                    El lugar es
                </th>
                <th>
                    Direccion
                </th>
                <th>
                    Info
                </th>
                <th>
                    Celular
                </th>
                <th>
                    
                </th>
                
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="salepoint in salepoints">
                <td>
                    @{{ salepoint.name }}
                </td>
                <td>
                    @{{ salepoint.type }}
                </td>
                <td>
                    @{{ salepoint.address }}
                </td>
                <td>
                    @{{ salepoint.info }}
                </td>
                <td>
                    @{{ salepoint.cellphone }}
                </td>
                <td>
                <div class="btn-group btn-group-sm" role="group" aria-label="Basic mixed styles example">
                    <a type="button" class="btn btn-outline-success" href="@{{ salepoint.photo }}" target="_blank">GoogleMaps</a>
                    <a type="button" class="btn btn-outline-warning" href="@{{ '/salepointedit/' + salepoint.id }}">Editar</a>
                    <button type="button" class="btn btn-outline-danger" ng-click="deleteSalePoint(salepoint.id)">Eliminar</button>
                </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>



</div>

@stop