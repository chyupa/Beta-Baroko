@extends('front.partials.master')

@section('content')
    <div class="single-category" ng-controller="CategoryController as categoryCtrl">
        <h1 class="text-center" ng-bind="categoryCtrl.name"></h1>
    </div>
@stop