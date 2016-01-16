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

        <form method="post">
            {{ csrf_field() }}
            <button class="btn btn-default" ng-click="productCtrl.addQuantity()">+1</button>
            <button class="btn btn-warning" ng-click="productCtrl.removeQuantity()" ng-disabled="productCtrl.quantity == 0">-1</button>
            <p>
                Quantity: <ng-pluralize count="productCtrl.quantity"
                                        when="{'0': '@{{ productCtrl.quantity }} @{{productCtrl.pluralExtension}}',
                                            'one' : '@{{ productCtrl.quantity }} @{{productCtrl.singleExtension}}',
                                            'other': '@{{ productCtrl.quantity }} @{{productCtrl.pluralExtension}}'}">
                </ng-pluralize>
            </p>
            <button type="button" class="btn btn-primary">Add to Cart</button>
        </form>
    </div>
@stop