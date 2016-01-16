@extends('front.partials.master')
@section('content')
    <div class="single-product-container" ng-controller="ProductController as productCtrl">
        <h1 class="text-center" ng-bind="productCtrl.product.name"></h1>

        <p>
            <span class="label label-primary" ng-if="productCtrl.product.public">Public</span>
            <span class="label label-success" ng-if="productCtrl.product.settings.featured">Featured</span>
            <span class="label label-info" ng-if="productCtrl.product.settings.promotion">Promotion</span>
            <span class="label label-warning" ng-if="productCtrl.product.settings.stock">Stock</span>
            <span class="label label-warning" ng-if="productCtrl.product.settings.designer_edition">Designer Edition</span>
        </p>

        <p ng-bind="productCtrl.product.info.description"></p>

        <p>
            Old Price: <span ng-bind="productCtrl.product.prices.old_price | currency"></span> / <span ng-bind="productCtrl.product.info.extension"></span>
        </p>

        <p>
            New Price: <span ng-bind="productCtrl.product.prices.price | currency"></span> / <span ng-bind="productCtrl.product.info.extension"></span>
        </p>

        <form method="post" ng-submit="productCtrl.submitForm()" role="form">
            {{ csrf_field() }}
            <button type="button" class="btn btn-default" ng-click="productCtrl.addQuantity()">+1</button>
            <button type="button" class="btn btn-warning" ng-click="productCtrl.removeQuantity()" ng-disabled="productCtrl.quantity == 0">-1</button>
            <p>
                Quantity: <span ng-bind="productCtrl.product.info.extension | extension:productCtrl.quantity"></span>
            </p>
            <button type="submit" class="btn btn-primary" ng-disabled="productCtrl.quantity == 0">Add to Cart</button>
        </form>
    </div>
@stop