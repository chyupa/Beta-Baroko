@extends('front.partials.master')
@section('content')
    <div class="single-product-container" ng-controller="ProductController as productCtrl">
        <h1 class="text-center" ng-bind="productCtrl.product.name"></h1>

        <p ng-bind="productCtrl.product.info.description"></p>

        <p>
            Old Price: <span ng-bind="productCtrl.product.prices.old_price | currency"></span> / <span ng-bind="productCtrl.product.info.extension"></span>
        </p>

        <p>
            New Price: <span ng-bind="productCtrl.product.prices.price | currency"></span> / <span ng-bind="productCtrl.product.info.extension"></span>
        </p>

        <form method="post">
            {{ csrf_field() }}
            <button type="button" class="btn btn-primary">Add to Cart</button>
        </form>
    </div>
@stop