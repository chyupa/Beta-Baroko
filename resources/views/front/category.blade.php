@extends('front.partials.master')

@section('content')
    <div class="single-category" ng-controller="CategoryController as categoryCtrl">
        <h1 class="text-center" ng-bind="categoryCtrl.category.name"></h1>
        <div class="row">
            <div class="col-xs-12">
                <div class="col-xs-3" ng-repeat="subcategory in categoryCtrl.category.subcategories">
                    <h4><a ng-href="/@{{ subcategory.slug }}" ng-bind="subcategory.name"></a></h4>
                    <p>Number of products: <span ng-bind="subcategory.productsCount"></span></p>
                </div>
            </div>
        </div>
    </div>
@stop