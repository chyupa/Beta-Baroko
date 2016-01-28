@extends('front.partials.master')
@section('content')
    <div class="row">
        <h1 class="text-center">Welcome to Beta Baroko</h1>

        <div class="homepage" ng-controller="HomePageController as homePageCtrl">
            <div class="col-xs-12">
                <div class="product-box col-xs-3" ng-repeat="product in homePageCtrl.products">
                    <h2>
                        <a ng-href="@{{ product.url }}" ng-bind="product.name"></a>
                    </h2>
                    <p>SKU code: <span ng-bind="product.info.code"></span></p>
                    <p ng-bind="product.info.description"></p>
                    <div>
                        <p>
                            Old Price: <span ng-bind="product.prices.old_price | currency"></span> / <span
                                ng-bind="product.info.extension"></span>
                        </p>
                        <p>
                            New Price: <span ng-bind="product.prices.price | currency"></span> / <span
                                ng-bind="product.info.extension"></span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop