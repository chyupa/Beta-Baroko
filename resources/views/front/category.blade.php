@extends('front.partials.master')

@section('content')
    <div class="single-category" ng-controller="CategoryController as categoryCtrl">
        <h1 class="text-center" ng-bind="categoryCtrl.category.name"></h1>
        <div class="row">
            <div class="col-xs-12">
                <div class="col-xs-3" ng-repeat="product in categoryCtrl.category.products">
                    <h4><a ng-href="/@{{ product.url }}" ng-bind="product.name"></a></h4>
                    <p>Old price <span ng-bind="product.prices.old_price | currency"></span></p>
                    <p>Price <span ng-bind="product.prices.price | currency"></span></p>
                </div>
            </div>
        </div>
    </div>
@stop