@extends('front.partials.master')
@section('content')
    <h1>Categories</h1>
    <div class="categories" ng-controller="CategoriesController as categoriesCtrl">
        <div class="row">
            <div class="col-xs-12">
                <div class="col-xs-3" ng-repeat="category in categoriesCtrl.categories">
                    <h4 ng-bind="category.name"></h4>
                </div>
            </div>
        </div>
    </div>
@stop