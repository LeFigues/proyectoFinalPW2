@extends('layouts.master')
@section('title', 'Edit Employee')
@section('content')
<script type="text/javascript">
    var app = angular.module('EmployeeEditModule', []);
    app.controller('EmployeeEditController', ($scope, $http) => {
        $scope.employee = {};
        angular.element(document).ready(function(){
            let url = window.location.href;
            let chars = url.split('/');
            let id = chars[chars.length - 1];

            $http.get(`/ajaxemployees/${id}`).then((result) => {
                $scope.employee = result.data;
                console.log(result)
            });
        });

        $scope.putEmployee = () => {
            $http.put('/ajaxemployees', $scope.employee).then((result) => {
                console.log(result);
                if (result.data.result === 1) {
                    window.location.href = '/ajaxemployeelist';
                }
            });
        }
    })
</script>
<div class="container" ng-app="EmployeeEditModule" ng-controller="EmployeeEditController">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Editar Empleado</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <a href="/ajaxemployeelist" type="button" class="btn btn-sm btn-outline-warning">Lista de Empleados</a>
            <button type="button" class="btn btn-sm btn-outline-secondary">Imprimir Empleado</button>
          </div>
        </div>
</div>    
<div class="form-floating">
    <form class="form-floating">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="txtFirstName" ng-model="employee.firstName">
            <label for="txtFirstName">Nombres</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="txtLastName" ng-model="employee.lastName">
            <label for="txtLastName">Apellidos</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="txtNit" ng-model="employee.ci">
            <label for="txtNit">CI</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="txtCellphone" ng-model="employee.cellphone">
            <label for="txtCellphone">Celular</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="txtDebt" ng-model="employee.salary">
            <label for="txtDebt">Salario</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="txtInfo" ng-model="employee.charge">
            <label for="txtInfo">Cargo</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="txtAddress" ng-model="employee.address">
            <label for="txtAddress">Direccion</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="txtBirthDate" ng-model="employee.birthDate">
            <label for="txtBirthDate">Fecha de Nacimiento</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="txtBirthDate" ng-model="employee.photo">
            <label for="txtBirthDate">Foto</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="txtUser" ng-model="employee.name">
            <label for="txtUser">Usuario</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="txtEmail" ng-model="employee.email">
            <label for="txtEmail">Email</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="txtPassword" ng-model="employee.password">
            <label for="txtPassword">Contraseña</label>
        </div>
        <div class="d-grid gap-2">
            <button class="btn btn-success" type="button" ng-click="putEmployee()">GuardarCambios</button>
        </div>
    </form>
</div>
</div>
@stop