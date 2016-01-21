@extends('front.partials.master')
@section('content')
    <h1 class="text-center">Checkout</h1>
    <div class="checkout-container" ng-controller="CheckoutController as checkoutCtrl">
        <div class="row">
            <form method="post" class="form" ng-submit="checkoutCtrl.placeOrder()" name="orderForm" role="form">
                <div class="col-sm-6">
                    <div class="form-group"
                         ng-class="{'has-error': orderForm.email.$error.email}">
                        <label for="email">Email <span>*</span></label>
                        <input type="email" id="email" class="form-control"
                               name="email"
                               ng-model="checkoutCtrl.formData.email"
                               required>
                        <p
                          ng-show="orderForm.email.$touched && orderForm.email.$error.required"
                          class="error">Your email is required.</p>
                        <p
                          ng-show="orderForm.email.$touched && orderForm.email.$error.email"
                          class="error">Your email is invalid.</p>
                    </div>
                    <div class="form-group"
                         ng-class="{'has-error': orderForm.name.$error.minlength}">
                        <label for="name">Name <span>*</span></label>
                        <input type="text" id="name" class="form-control"
                               name="name"
                               ng-model="checkoutCtrl.formData.name"
                               ng-minlength="3"
                               required>
                        <p
                          ng-show="orderForm.name.$touched && orderForm.name.$error.required"
                          class="error">Your name is required.</p>
                        <p
                          ng-show="orderForm.name.$touched && orderForm.name.$error.minlength"
                          class="error">Your name is to small. Just like something else you have.</p>
                    </div>
                    <div class="form-group"
                         ng-class="{'has-error': orderForm.number.$error.pattern}">
                        <label for="number">Number <span>*</span></label>
                        <input type="text" id="number" class="form-control"
                               name="number"
                               ng-model="checkoutCtrl.formData.number"
                               ng-pattern="/^[0-9]{1,7}$/"
                               required>
                        <p
                          ng-show="orderForm.number.$touched && orderForm.number.$error.required"
                          class="error">Your number is required.</p>
                        <p
                          ng-show="orderForm.number.$touched && orderForm.number.$error.pattern"
                          class="error">Pattern sucks.</p>
                    </div>
                    <div class="form-group">
                        <label for="scara">Scara</label>
                        <input type="text" id="scara" class="form-control"
                               name="scara"
                               ng-model="checkoutCtrl.formData.scara">
                    </div>
                    <div class="form-group">
                        <label for="apartment">Apartment</label>
                        <input type="text" id="apartment" class="form-control"
                               name="apartment"
                               ng-model="checkoutCtrl.formData.apartment">
                    </div>
                    <div class="form-group">
                        <label for="city">City <span>*</span></label>
                        <input type="text" id="city" class="form-control"
                               name="city"
                               ng-model="checkoutCtrl.formData.city"
                               required>
                        <p
                          ng-show="orderForm.city.$touched && orderForm.city.$error.required"
                          class="error">Your city is required.</p>
                    </div>
                    <div class="form-group">
                        <label for="country">Country</label>
                        <input type="text" id="country" class="form-control"
                               name="country"
                               ng-model="checkoutCtrl.formData.country">
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea rows="5" id="message" class="form-control"
                                  name="message"
                                  ng-model="checkoutCtrl.formData.message"></textarea>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group"
                         ng-class="{'has-error': orderForm.phone.$error.pattern}">
                        <label for="phone">Phone <span>*</span></label>
                        <input type="text" id="phone" class="form-control"
                               name="phone"
                               ng-model="checkoutCtrl.formData.phone"
                               ng-pattern="/^(?:(?:(?:00\s?|\+)40\s?|0)(?:7\d{2}\s?\d{3}\s?\d{3}|(21|31)\d{1}\s?\d{3}\s?\d{3}|((2|3)[3-7]\d{1})\s?\d{3}\s?\d{3}|(8|9)0\d{1}\s?\d{3}\s?\d{3}))$/"
                               required>
                        <p
                          ng-show="orderForm.phone.$touched && orderForm.phone.$error.required"
                          class="error">Your phone is required.</p>
                        <p
                          ng-show="orderForm.phone.$touched && orderForm.phone.$error.pattern"
                          class="error">Your phone number is invalid.</p>
                    </div>
                    <div class="form-group">
                        <label for="street">Street <span>*</span></label>
                        <input type="text" id="street" class="form-control"
                               name="street"
                               ng-model="checkoutCtrl.formData.street"
                               required>
                        <p
                          ng-show="orderForm.street.$touched && orderForm.street.$error.required"
                          class="error">Your street is required.</p>
                    </div>
                    <div class="form-group">
                        <label for="bloc">Bloc</label>
                        <input type="text" id="bloc" class="form-control"
                               name="bloc"
                               ng-model="checkoutCtrl.formData.bloc">
                    </div>
                    <div class="form-group">
                        <label for="floor">Floor</label>
                        <input type="text" id="floor" class="form-control"
                               name="floor"
                               ng-model="checkoutCtrl.formData.floor">
                    </div>
                    <div class="form-group">
                        <label for="interphone">Interphone</label>
                        <input type="text" id="interphone" class="form-control"
                               name="interphone"
                               ng-model="checkoutCtrl.formData.interphone">
                    </div>
                    <div class="form-group">
                        <label for="county">County <span>*</span></label>
                        <input type="text" id="county" class="form-control"
                               name="county"
                               ng-model="checkoutCtrl.formData.county"
                               required>
                        <p
                          ng-show="orderForm.county.$touched && orderForm.county.$error.required"
                          class="error">Your county is required.</p>
                    </div>
                </div>
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary" ng-disabled="orderForm.$invalid">Place order</button>
                </div>
            </form>
        </div>
    </div>
@stop