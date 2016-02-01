@extends('front.partials.master')

@section('content')
    <div class="contact-form" ng-controller="ContactController as contactCtrl">
        <h1 class="text-center">Contact Us</h1>
        <div class="row">
            <div class="col-xs-12">
                <form class="form" ng-submit="contactCtrl.submitForm()" role="form" name="contactForm">
                    <div class="form-group">
                        <label for="name">Your Name</label>
                        <input type="text" name="name" class="form-control"
                               ng-model="contactCtrl.formData.name"
                               ng-minlength="3"
                               required>
                        <p
                            ng-show="contactForm.name.$touched && contactForm.name.$error.required"
                            class="error">Your name is required.</p>
                        <p
                            ng-show="contactForm.name.$touched && contactForm.name.$error.minlength"
                            class="error">Your name is to small. Just like something else you have.</p>
                    </div>
                    <div class="form-group">
                        <label for="email">Your Email</label>
                        <input type="email" name="email" class="form-control"
                               ng-model="contactCtrl.formData.email"
                               required>
                        <p
                            ng-show="contactForm.email.$touched && contactForm.email.$error.required"
                            class="error">Your email is required.</p>
                        <p
                            ng-show="contactForm.email.$touched && contactForm.email.$error.email"
                            class="error">Your email is invalid.</p>
                    </div>
                    <div class="form-group">
                        <label for="phone">Your Phone</label>
                        <input type="text" name="phone" class="form-control"
                               ng-model="contactCtrl.formData.phone"
                               ng-pattern="/^(?:(?:(?:00\s?|\+)40\s?|0)(?:7\d{2}\s?\d{3}\s?\d{3}|(21|31)\d{1}\s?\d{3}\s?\d{3}|((2|3)[3-7]\d{1})\s?\d{3}\s?\d{3}|(8|9)0\d{1}\s?\d{3}\s?\d{3}))$/"
                               required>
                        <p
                            ng-show="contactForm.phone.$touched && contactForm.phone.$error.required"
                            class="error">Your phone is required.</p>
                        <p
                            ng-show="contactForm.phone.$touched && contactForm.phone.$error.pattern"
                            class="error">Your phone number is invalid.</p>
                    </div>
                    <div class="form-group">
                        <label for="message">Your Message</label>
                        <textarea name="message" class="form-control" rows="6"
                                  ng-model="contactCtrl.formData.message"
                                  required></textarea>
                        <p
                            ng-show="contactForm.message.$touched && contactForm.message.$error.required"
                            class="error">Your message is required.</p>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Send message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop