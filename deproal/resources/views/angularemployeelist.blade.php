@extends('layouts.master')
@section('title', 'Employee List')
@section('content')
<script type="text/javascript">
    var app = angular.module('EmployeeListModule', []);
    app.controller('EmployeeListController', ($scope, $http) => {
        $scope.employees = [];

        $scope.getEmployees = () => {
            $http.get('/employees').then((result) => {
                $scope.employees = result.data;
            });
        }

        angular.element(document).ready(() => {
            $http.get('/ajaxemployees').then((result) => {
                $scope.employees = result.data;
            });
        });

        $scope.deleteEmployee = (id) =>{
            $http.delete(`ajaxemployees/${id}`).then((result) => {
                if (result.data.result === 1) {
                    window.location.href = '/ajaxemployeelist';
                }
            });
        }
    })
</script>
<div class="container" ng-app="EmployeeListModule" ng-controller="EmployeeListController">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Empleados</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <a href="/ajaxnewemployee" type="button" class="btn btn-sm btn-outline-success">Registrar Empleado</a>
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
                    Cargo
                </th>
                <th>
                    Nombres
                </th>
                <th>
                    Apellidos
                </th>
                <th>
                    Celular
                </th>
                <th>
                    Fecha de Nacimiento
                </th>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="employee in employees">
                <td>
                    @{{ employee.photo }}
                </td>
                <td>
                    @{{ employee.charge }}
                </td>
                <td>
                    @{{ employee.firstName }}
                </td>
                <td>
                    @{{ employee.lastName }}
                </td>
                <td>
                    @{{ employee.cellphone }}
                </td>
                <td>
                    @{{ employee.birthDate }}
                </td>
                <td>
                <div class="btn-group btn-group-sm" role="group" aria-label="Basic mixed styles example">
                    <a type="button" class="btn btn-outline-warning" href="@{{ '/editemployee/' + employee.id }}">Editar</a>
                    <button type="button" class="btn btn-outline-danger" ng-click="deleteEmployee(employee.id)">Eliminar</button>
                </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@stop