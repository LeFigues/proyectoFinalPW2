@extends('layouts.master')
@section('title', 'Clientes')
@section('content')
<script type="text/javascript">
    var app = angular.module('CustomerListModule', []);
    app.controller('CustomerListController', ($scope, $http) => {
        $scope.customers = [];

        angular.element(document).ready(() => {
            $http.get('/ajaxcustomers').then((result) => {
                $scope.customers = result.data;
            });
        });
        $scope.deleteCustomer = (id) =>{
            $http.delete(`ajaxcustomers/${id}`).then((result) => {
                if (result.data.result === 1) {
                    window.location.href = '/ajaxcustomerlist';
                }
            });
        }
    })
</script>
<div class="container" ng-app="CustomerListModule" ng-controller="CustomerListController">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Clientes</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <a href="/ajaxnewcustomer" type="button" class="btn btn-sm btn-outline-success">Registrar Cliente</a>
            <button type="button" class="btn btn-sm btn-outline-secondary">Imprimir Lista</button>
          </div>
        </div>
</div>
<table class="table table-striped">
        <thead>
            <tr>
                <th>
                    NIT
                </th>
                <th>
                    Nombres
                </th>
                <th>
                    Apellidos
                </th>
                <th>
                    Direccion
                </th>
                <th>
                    Deuda
                </th>
                <th>
                    Cellphone
                </th>
                <th>
                    
                </th>
                
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="customer in customers">
                <td>
                    @{{ customer.nit }}
                </td>
                <td>
                    @{{ customer.firstName }}
                </td>
                <td>
                    @{{ customer.lastName }}
                </td>
                <td>
                    @{{ customer.address }}
                </td>
                <td>
                    @{{ customer.debt }}
                </td>
                <td>
                    @{{ customer.cellphone }}
                </td>
                <td>
                <div class="btn-group btn-group-sm" role="group" aria-label="Basic mixed styles example">
                    <button type="button" class="btn btn-outline-success">Vender</button>
                    <a type="button" class="btn btn-outline-warning" href="@{{ '/editcustomer/' + customer.id }}">Editar</a>
                    <button type="button" class="btn btn-outline-danger" ng-click="deleteCustomer(customer.id)">Eliminar</button>

                    
                </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>



</div>

@stop