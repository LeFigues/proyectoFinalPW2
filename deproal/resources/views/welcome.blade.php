<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>DEPROAL</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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

        <script type="text/javascript">
            var app = angular.module('SalePointListModule', []);
            app.controller('SalePointListController', ($scope, $http) => {
                $scope.salepoints = [];

                angular.element(document).ready(() => {
                    $http.get('/salepoints').then((result) => {
                        $scope.salepoints = result.data;
                    });
                });
            })
        </script>
    
      </head>
    <body class="antialiased">
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
              <a class="navbar-brand" href="Deproal.html">Industrias Deproal</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="Deproal.html">Inicio</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="comprar.html">Comprar</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="products.html" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Productos
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="products.html">La Vina</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="products.html">Ron Baron</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="products.html">Fiesta</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="products.html">Cana Dorada</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="products.html">Vodka Russo</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="products.html">Cuba Libre</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="products.html">Nitro</a></li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="puntosdeventa.html">Puntos de Venta</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="aboutus.html">Sobre Nosotros</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="contacto.html">Contacto</a>
                  </li>
                </ul>
                <div class="col-md-4 text-end">
                    <a type="button" class="btn btn-outline-success me-2" href="login">Iniciar Sesion</a>
                    <a type="button" class="btn btn-outline-primary" href="register">Registrate</a>
                    <a type="button" class="btn btn-outline-warning" href="newclientregister">Cliente Nuevo?</a>
                </div>
              </div>
            </div>
      </nav>
      <div>
        <img src="{{ asset('images/others/fondoInicial.jpg') }}" height="450 px" class="d-block w-100">
      </div>

      <hr class="featurette-divider">

      <div class="container">
        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">Industrias DEPROAL <span class="text-muted">|   Nuestra Historia</span></h2>
            <p class="lead"> Texto de Historia de la empresa Texto de Historia de la empresa Texto de Historia de la empresa Texto de Historia de la empresa Texto de Historia de la empresa Texto de Historia de la empresa Texto de Historia de la empresa Texto de Historia de la empresa Texto de Historia de la empresa Texto de Historia de la empresa Texto de Historia de la empresa</p>
          </div>
          <div class="col-md-5">
            <img src="{{ asset('images/others/monolito.jpg') }}" width="307 px" height="547 px">
    
          </div>
        </div>
      </div>
      <hr class="featurette-divider">



      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="{{ asset('images/others/carrousel1.jpg') }}" class="d-block w-100" alt="..." height="800 px">
                <div class="carousel-caption d-none d-md-block">
                  <h5>First slide label</h5>
                  <p>Some representative placeholder content for the first slide.</p>
                </div>
              </div>
              <div class="carousel-item bg-dark">
                <img src="{{ asset('images/others/carrousel2.jpeg') }}" class="d-block w-100" alt="..." height="800 px">
                <div class="carousel-caption">
                  <div class="container">
                    <div class="row">
                      <div class="col">
                        1 of 3
                      </div>
                      <div class="col-6">
                        2 of 3 (wider)
                      </div>
                      <div class="col">
                        3 of 3
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <img src="{{ asset('images/others/carrousel3.jpg') }}" class="d-block w-100" alt="..." height="800 px">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Third slide label</h5>
                  <p>Some representative placeholder content for the third slide.</p>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
      </div>

      <div class="container px-4 py-5" id="custom-cards">
        <h2 class="pb-2 border-bottom">Nuestra Seleccion Destacada</h2>
    
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

        <div class="col">
          <div class="card shadow-sm">
            <img src="{{ asset('images/others/select1.jpg') }}" height="450 px">
            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-success">Comprar</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
            <img src="{{ asset('images/others/select2.jpg') }}" height="450 px">
            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-success">Comprar</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
            <img src="{{ asset('images/others/select3.jpg') }}" height="450 px">
            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-success">Comprar</button>
                </div>
              </div>
            </div>
          </div>
        </div>

        

        
      </div>

      <div class="container" ng-app="SalePointListModule" ng-controller="SalePointListController">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Puntos de Venta</h1>
        </div>
        <table class="table table-striped">
        <thead>
            <tr>
                <th>
                    Nombre
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
                    <button type="button" class="btn btn-outline-success">GoogleMaps</button>
                </div>
                </td>
            </tr>
        </tbody>
    </table>
      </div>
      
    </div>


</div>



      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    </body>
    <div class="container">
      <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <p class="col-md-4 mb-0 text-muted">&copy; 2022 Industrias Deproal, Inc</p>
    
        <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
          <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
        </a>
    
        <ul class="nav col-md-4 justify-content-end">
          <li class="nav-item"><a href="Deproal.html" class="nav-link px-2 text-muted">Inicio</a></li>
          <li class="nav-item"><a href="contacto.html" class="nav-link px-2 text-muted">Contacto</a></li>
          <li class="nav-item"><a href="products.html" class="nav-link px-2 text-muted">Productos</a></li>
          <li class="nav-item"><a href="puntosdeventa.html" class="nav-link px-2 text-muted">Puntos de Venta</a></li>
          <li class="nav-item"><a href="aboutus.html" class="nav-link px-2 text-muted">Sobre Nosotros</a></li>
        </ul>
      </footer>
    </div>
</html>
