@extends('front.partials.master')
@section('content')
  <div class="cart-contents-container" ng-controller="CartController as cartCtrl">
    <h1 class="text-center">Cart</h1>
    <div class="cart-contents">
      <table class="table table-responsive">
        <thead>
          <tr>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr ng-repeat="cartContent in cartCtrl.cartContents">
            <td>Product @{{ $index }}</td>
            <td ng-bind="cartContent.quantity"></td>
            <td ng-bind="cartContent.price | currency"></td>
            <td>
              <button type="button" class="btn btn-default">+1</button>
              <button type="button" class="btn btn-warning">-1</button>
            </td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>Transport fee: <span ng-bind="cartCtrl.transportFee | currency"></span></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>Total: <span ng-bind="cartCtrl.total | currency"></span></td>
          </tr>
        </tbody>
      </table>
      <a class="pull-right btn btn-primary" href="#">Checkout</a>
    </div>
  </div>
@stop