@extends('layouts.master')
@section('title', 'Ventas')
@section('content')
<script type="text/javascript">
    var app = angular.module('SalesListModule', []);
    app.controller('SalesListController', ($scope, $http) => {
        $scope.customers = [];

        angular.element(document).ready(() => {
            $http.get('/ajaxcustomers').then((result) => {
                $scope.customers = result.data;
            });
        });
    })
</script>
<div class="container" ng-app="SalesListModule" ng-controller="SalesListController">

  <div class="container">
  <p>
    <div class="d-grid gap-2">
    <button class="btn btn-primary d-grid gap-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthVRapida" aria-expanded="false" aria-controls="collapseWidthExample">
      Venta Rapida
    </button>
    </div>
  </p>
  <div style="min-height: 120px;">
    <div class="collapse collapse-horizontal" id="collapseWidthVRapida">
     <div class="card card-body" style="width: 300px;">
        This is some placeholder content for a horizontal collapse. It's hidden by default and shown when triggered.
      </div>
    </div>
  </div>

<p>
  <div class="d-grid gap-2">
  <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
    Vender a Cliente
  </button>
  </div>
</p>
<div style="min-height: 120px;">
  <div class="collapse collapse-horizontal" id="collapseWidthExample">
    <div class="card card-body">
    <table class="table table-striped">
              <thead>
                <tr>
                  <th>NIT</th>
                  <th>Cliente</th>
                  <th>Celular</th>
                  <th></th>
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
                    @{{ customer.cellphone }}
                  </td>
                  <td>
                  <div class="d-grid gap-2 col-6 mx-auto">
                    <a type="button" class="btn btn-outline-warning" href="@{{ '/editcustomer/' + customer.id }}">Vender</a>
                  </div>
                  </td>
                </tr>
              </tbody>
            </table>
    </div>
  </div>
</div>


  
  </div>
</div>
@stop