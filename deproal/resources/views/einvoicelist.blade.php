@extends('layouts.master')
@section('title', 'Historial')
@section('content')
<script type="text/javascript">
    var app = angular.module('EasyInvoiceListModule', []);
    app.controller('EasyInvoiceListController', ($scope, $http) => {
        $scope.invoices = [];

        angular.element(document).ready(() => {
            $http.get('/einvoices').then((result) => {
                $scope.invoices = result.data;
            });
        });

        $scope.deleteEasyInvoice = (id) =>{
            $http.delete(`einvoices/${id}`).then((result) => {
                if (result.data.result === 1) {
                    window.location.href = '/einvoicelist';
                }
            });
        }
    })
</script>
<div class="container" ng-app="EasyInvoiceListModule" ng-controller="EasyInvoiceListController">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Historial de Ventas</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <a href="/einvoicenew" type="button" class="btn btn-sm btn-outline-success">Registrar Venta</a>
            <button type="button" class="btn btn-sm btn-outline-secondary">Imprimir Lista</button>
          </div>
        </div>
</div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>
                    #
                </th>
                <th>
                    NIT
                </th>
                <th>
                    Cliente
                </th>
                <th>
                    Fecha
                </th>
                <th>
                    Total
                </th>
                <th>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="invoice in invoices">
                <td>
                    @{{ invoice.invoiceNumber }}
                </td>
                <td>
                    @{{ invoice.nit }}
                </td>
                <td>
                    @{{ invoice.customer }}
                </td>
                <td>
                    @{{ invoice.invoiceDate }}
                </td>
                <td>
                    @{{ invoice.invoiceTotal }}
                </td>
                <td>
                <div class="btn-group btn-group-sm" role="group" aria-label="Basic mixed styles example">
                    <a type="button" class="btn btn-outline-secondary" href="@{{ '/einvoiceedit/' + invoice.id }}">Ver Detalles</a>
                    <a type="button" class="btn btn-outline-warning" href="@{{ '/einvoiceedit/' + invoice.id }}">Editar</a>
                    <button type="button" class="btn btn-outline-danger" ng-click="deleteEasyInvoice(invoice.id)">Eliminar</button>
                </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@stop