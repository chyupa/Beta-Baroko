@extends('front.partials.master')
@section('content')
    <div class="mdl-cell mdl-cell--12-col" ng-controller="ProductController as productCtrl">
        <div class="mdl-card mdl-cell--12-col mdl-shadow--2dp">
            <div class="mdl-card__title">
                <h2 class="mdl-card__title-text" ng-bind="productCtrl.product.name"></h2>
            </div>
            <div class="mdl-card__supporting-text">
                <ul class="mdl-list">
                    <li class="mdl-list__item" ng-if="productCtrl.product.public">
                        <span class="mdl-list__item-primary-content">
                            <i class="material-icons mdl-list__item-icon">public</i>
                            Public
                        </span>
                    </li>
                    <li class="mdl-list__item" ng-if="productCtrl.product.settings.featured">
                        <span class="mdl-list__item-primary-content">
                            <i class="material-icons mdl-list__item-icon">favorite</i>
                            Featured
                        </span>
                    </li>
                    <li class="mdl-list__item" ng-if="productCtrl.product.settings.promotion">
                        <span class="mdl-list__item-primary-content">
                            <i class="material-icons mdl-list__item-icon">shopping_basket</i>
                            Promotion
                        </span>
                    </li>
                    <li class="mdl-list__item" ng-if="productCtrl.product.settings.stock">
                        <span class="mdl-list__item-primary-content">
                            <i class="material-icons mdl-list__item-icon">menu</i>
                            Stock
                        </span>
                    </li>
                    <li class="mdl-list__item" ng-if="productCtrl.product.settings.designer_edition">
                        <span class="mdl-list__item-primary-content">
                            <i class="material-icons mdl-list__item-icon">extension</i>
                            Designer Edition
                        </span>
                    </li>
                </ul>

                <h4>Description</h4>
                <p ng-bind="productCtrl.product.info.description"></p>

                <h4>Prices</h4>
                <p>
                    Old Price: <span ng-bind="productCtrl.product.prices.old_price | currency"></span> / <span ng-bind="productCtrl.product.info.extension"></span>
                </p>

                <p>
                    New Price: <span ng-bind="productCtrl.product.prices.price | currency"></span> / <span ng-bind="productCtrl.product.info.extension"></span>
                </p>

                <h4>Add to basket</h4>
                <form method="post" ng-submit="productCtrl.submitForm()" role="form">
                    {{ csrf_field() }}

                    <button type="button" class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab" ng-click="productCtrl.addQuantity()">
                        <i class="material-icons">add</i>
                    </button>

                    <button type="button" class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab" ng-click="productCtrl.removeQuantity()" ng-disabled="productCtrl.quantity == 0">
                        <i class="material-icons">remove</i>
                    </button>
                    <p>
                        Quantity: <span ng-bind="productCtrl.product.info.extension | extension:productCtrl.quantity"></span>
                    </p>
                    <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" ng-disabled="productCtrl.quantity == 0">Add to Cart</button>
                </form>

            </div>
            <div class="mdl-card__actions mdl-card--border">
                <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                    Get Started
                </a>
            </div>
        </div>
    </div>
@stop