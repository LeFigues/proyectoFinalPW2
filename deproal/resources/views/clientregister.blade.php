<!DOCTYPE html>
<html>
    <head>
        <title>Registro</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/angular-material/1.2.2/angular-material.min.css" integrity="sha512-dMahqxu9L2XnPgHEO4mWksNGfyvOsV2rtMt5TX7OJdWbky+sw9dyMPw8gwhohmwVXAJW5zVCfdyvhutemjYuzg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.8.2/angular.min.js" integrity="sha512-7oYXeK0OxTFxndh0erL8FsjGvrl2VMDor6fVqzlLGfwOQQqTbYsGPv4ZZ15QHfSk80doyaM0ZJdvkyDcVO7KFA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-animate/1.8.2/angular-animate.min.js" integrity="sha512-jZoujmRqSbKvkVDG+hf84/X11/j5TVxwBrcQSKp1W+A/fMxmYzOAVw+YaOf3tWzG/SjEAbam7KqHMORlsdF/eA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-aria/1.8.2/angular-aria.min.js" integrity="sha512-IP/3KOfYYFXQTJVQkBfavKkpvK8u+JD5r2C5vO3Dj3ufl7Xk0SoI0Oh2MXMFcGSAOxK6oZhWbZVWglgvZwAU+w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-messages/1.8.2/angular-messages.min.js" integrity="sha512-X3xzYri4sQgIJ9lQOEJesZcYYJsdDBekZU9AuEsSXwCHJTOkcEn4Chh9kUlTzTgYKWnQNxT3H96X5boZMuco+Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-material/1.2.2/angular-material.min.js" integrity="sha512-d33Yhig4j7KzFwP6m2cqIOpLlDKJBgi1XyE909d4bKaNwdZb1TF6XRbsyHHk37Sp8p7aP2u9gyykeU1SRKzPHQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js" integrity="sha512-WFN04846sdKMIP5LKNphMaWzU7YpMyCU245etK3g/2ARYbPK9Ub18eG+ljU96qKRCWh+quCY7yefSmlkQw1ANQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    </head>
    <body>
    <script type="text/javascript">
    var app = angular.module('CustomerAddModule', []);
    app.controller('CustomerAddController', ($scope, $http) => {
        $scope.customer = {};
        $scope.addCustomer = () => {
            $http.post('/clientregister', $scope.customer).then((result) => {
                console.log(result);
                if (result.data.result === 1) {

                    window.location.href = 'login';
                    
                }
            });
        }
    })
</script>
<div class="container" ng-app="CustomerAddModule" ng-controller="CustomerAddController">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h3 class="h2">Registrate para Comprar Productos</h3>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <a href="/" type="button" class="btn btn-sm btn-outline-secondary">Regresar</a>
          </div>
        </div>
</div>    
<div class="form-floating">
    <form class="form-floating">
        
            <input type="text" class="form-control" id="txtDebt" value="0" ng-model="customer.debt" >
            <input type="text" class="form-control" id="txtInfo" value="Registrado Por WEB" ng-model="customer.info" >
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="txtFirstName" ng-model="customer.firstName">
            <label for="txtFirstName">Nombres</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="txtLastName" ng-model="customer.lastName">
            <label for="txtLastName">Apellidos</label>
        </div>
        <div class="form-floating mb-3">
            <input type="number" class="form-control" id="txtNit" ng-model="customer.nit">
            <label for="txtNit">NIT</label>
        </div>
        <div class="form-floating mb-3">
            <input type="number" class="form-control" id="txtCellphone" ng-model="customer.cellphone">
            <label for="txtCellphone">Celular</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="txtAddress" ng-model="customer.address">
            <label for="txtAddress">Direccion</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="txtBirthDate" ng-model="customer.birthDate">
            <label for="txtBirthDate">Fecha de Nacimiento</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="txtUser" ng-model="customer.name">
            <label for="txtUser">Usuario</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="txtEmail" ng-model="customer.email">
            <label for="txtEmail">Email</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="txtPassword" ng-model="customer.password">
            <label for="txtPassword">Contraseña</label>
        </div>
        <div class="d-grid gap-2">
            <button class="btn btn-success" type="button" ng-click="addCustomer()">Registrarse</button>
        </div>
    </form>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    </body>
</html>
