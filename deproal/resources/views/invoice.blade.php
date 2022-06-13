@extends('layouts.master')
@section('title', 'Ventas')
@section('content')
<script>
    var app = angular.module('InvoiceAddModule', ['ngMaterial']);
    app.controller('InvoiceAddController', ($scope, $http, $mdDialog) => {
        $scope.invoice = {invoiceDetails: []};
        $scope.invoiceForm = {}
        $scope.products = []
        $scope.controller = this

        angular.element(document).ready(() => {
            $http.get('/ajaxproducts').then((result) => {
                $scope.products = result.data;
            })
        });

        $scope.searchNit = () => {
            $http({
                url: '/ajaxcustomers', 
                method: 'GET',
                params: { nit: $scope.invoice.nit }
            }).then((result) => {
                let customers = result.data;

                if (customers.length === 0) {
                    alert('Customer does not exist');
                    return;
                }

                $scope.invoice.customerId = customers[0].id;
                $scope.invoiceForm.customerName = customers[0].firstName + ' ' + customers[0].lastName;
                $scope.invoiceForm.customerCellphone = customers[0].cellphone;
                $scope.invoiceForm.customerAddress = customers[0].address;
            })
        }


        $scope.showProductDialog = () => {
            $mdDialog.show({
                title: 'Select product',
                clickOutsideToClose: true,
                template: document.querySelector('#dlginvoiceForm').innerHTML,
                controller: function() {
                    return $scope.controller
                },
                controllerAs: 'ctrl'
            });

        }

        $scope.addProduct = () => {
            let product = _.find($scope.products, p => {
                return p.id === parseInt($scope.invoiceForm.productId)
            });
            
            $scope.invoice.invoiceDetails.push({
                productId: $scope.invoiceForm.productId,
                productName: product.name,
                productPrice: product.price,
                productSubName: product.subname,
                quantity: $scope.invoiceForm.quantity,
                subtotal: product.price * $scope.invoiceForm.quantity
            });

            console.log($scope.invoice.invoiceDetails)
            $mdDialog.hide();
        }

        $scope.postInvoice = () => {
            $http.post('/ventas', $scope.invoice).then((response) => {
                let res = response.data.result;

                if (res == 1) {
                    alert('Invoice registered')
                } else {
                    alert(response.data.result);
                    console.log(response.data.result);
                }
            })
        }
    })
</script>
<div class="container">
    <div class="content" ng-app="InvoiceAddModule" ng-controller="InvoiceAddController">
        <h2>Nueva Venta</h2>
        <div>
            <form class="form-floating">
                <div>
                    <h5>Datos del Cliente</h5>
                    <div class="input-group mb-3">
                        <span class="input-group-text">NIT</span>
                        <input type="text" class="form-control" aria-label="NIT" ng-model="invoice.nit" ng-blur="searchNit()">
                        <span class="input-group-text">Cliente</span>
                        <input type="text" class="form-control" aria-label="Cliente" value="@{{ invoiceForm.customerName }}">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Celular</span>
                        <input type="text" class="form-control" aria-label="Cliente" value="@{{ invoiceForm.customerCellphone }}">
                        <span class="input-group-text">Direccion</span>
                        <input type="text" class="form-control" aria-label="Cliente" value="@{{ invoiceForm.customerAddress }}">
                    </div> 
                </div>
                <div>
                    <h5>Detalles de la Venta</h5>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Fecha</span>
                        <input type="text" class="form-control" placeholder="2022-06-11 / YY-MM-DD" aria-label="NIT" ng-model="invoice.date" >
                        <span class="input-group-text">Tipo de Pago</span>
                        <input type="text" class="form-control" placeholder="Al Contado" aria-label="Cliente" ng-model="invoice.typepayment">
                    </div>
                    <div class="input-group">
                        <span class="input-group-text">Detalles Extra</span>
                        <textarea class="form-control" aria-label="With textarea"></textarea>
                    </div>
                </div>
            </form>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-8">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th>
                                Foto
                            </th>
                            <th>
                                Producto
                            </th>
                            <th>
                                Variante
                            </th>
                            <th>
                                Stock
                            </th>
                            <th>
                                Precio
                            </th>
                            <th>
                                
                            </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="product in products">
                            <td>
                                @{{ product.photo }}
                            </td>
                            <td>
                                @{{ product.name }}
                            </td>
                            <td>
                                @{{ product.subname }}
                            </td>
                            <td>
                                @{{ product.quantity }}
                            </td>
                            <td>
                                @{{ product.price }}
                            </td>
                            <td>
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2">Seleccionar</button>
                            </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label>Producto:</label>
                        <select class="form-control" ng-model="invoiceForm.productId">
                            <option ng-repeat="product in products" value="@{{ product.id }}">
                                @{{ product.name }}
                            </option>
                        </select>
                        <label>Cantidad:</label>
                        <input class="form-control" ng-model="invoiceForm.quantity" />
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-outline-success" ng-click="addProduct()">
                            Agregar
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>
                        Producto
                    </th>
                    <th>
                        Variante
                    </th>
                    <th>
                        Precio
                    </th>
                    <th>
                        Cantidad
                    </th>
                    <th>
                        Subtotal
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="detail in invoice.invoiceDetails">
                    <td>
                        @{{ detail.productName }}
                    </td>
                    <td>
                        @{{ detail.productSubName }}
                    </td>
                    <td>
                        @{{ detail.productPrice }}
                    </td>
                    <td>
                        @{{ detail.quantity }}
                    </td>
                    <td>
                        @{{ detail.subtotal }}
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="d-grid gap-2">
            <button class="btn btn-success" ng-click="postInvoice()">
                    Vender 
            </button>
        </div>
    </div>
</div>
@stop