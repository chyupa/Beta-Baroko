@extends('front.partials.master')

@section('content')
    <div class="mdl-grid" ng-controller="CategoryController as categoryCtrl">
        <div class="mdl-cell--12-col">
            <h1 ng-bind="categoryCtrl.category.name"></h1>
        </div>
        <div class="mdl-card mdl-cell mdl-cell--4-col mdl-shadow--2dp" ng-repeat="subcategory in categoryCtrl.category.subcategories">
            <div class="mdl-card__title">
                <h2 class="mdl-card__title-text" ng-bind="subcategory.name"></h2>
            </div>
            <div class="mdl-card__supporting-text">
                <p>Number of products: <span ng-bind="subcategory.productsCount"></span></p>
            </div>
            <div class="mdl-card__actions mdl-card--border">
                <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" ng-href="/subcategory/@{{ subcategory.slug }}">
                    Check Products
                </a>
            </div>
        </div>
    </div>
@stop