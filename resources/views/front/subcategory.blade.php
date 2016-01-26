@extends('front.partials.master')

@section('content')
    <div class="subcategory-page" ng-controller="SubcategoryController as subcategoryCtrl">
        <h1 class="text-center" ng-bind="subcategoryCtrl.subcategory.name"></h1>
        <div class="col-xs-12">
            <div class="col-xs-3" ng-repeat="product in subcategoryCtrl.subcategory.products">
                <h2><a href="/@{{ product.url }}" ng-bind="product.name"></a></h2>
                <p>Old price: <span ng-bind="product.prices.old_price | currency"></span></p>
                <p>Price: <span ng-bind="product.prices.price | currency"></span></p>
            </div>
        </div>
    </div>
@stop