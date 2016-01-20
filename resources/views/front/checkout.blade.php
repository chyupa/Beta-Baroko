@extends('front.partials.master')
@section('content')
    <h1 class="text-center">Checkout</h1>
    <div class="checkout-container" ng-controller="CheckoutController as checkoutCtrl">
        <div class="row">
            <form action="#" class="form" name="orderForm" role="form">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" id="email" class="form-control" value=""
                               ng-model="checkoutCtrl.formData.email"
                               ng-minlength="3"
                               required>
                        <div class="help-block" ng-messages="checkoutCtrl.formData.email.$error" ng-if="checkoutCtrl.formData.email.$touched">
                            <p ng-message="required">Your name is required.</p>
                            <p ng-message="minlength">Your asd.</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" class="form-control" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="number">Number</label>
                        <input type="text" id="number" class="form-control" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="scara">Scara</label>
                        <input type="text" id="scara" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label for="apartment">Apartment</label>
                        <input type="text" id="apartment" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" id="city" class="form-control" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="country">Country</label>
                        <input type="text" id="country" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea rows="5" id="message" class="form-control"></textarea>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" id="phone" class="form-control" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="street">Street</label>
                        <input type="text" id="street" class="form-control" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="bloc">Bloc</label>
                        <input type="text" id="bloc" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label for="floor">Floor</label>
                        <input type="text" id="floor" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label for="interphone">Interphone</label>
                        <input type="text" id="interphone" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label for="county">County</label>
                        <input type="text" id="county" class="form-control" value="" required>
                    </div>
                </div>
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary">Place order</button>
                </div>
            </form>
        </div>
    </div>
@stop