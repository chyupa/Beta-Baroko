@extends('front.partials.master')

@section('content')
    <div class="conversation-container" ng-controller="ConversationController as conversationCtrl">
        <h1 class="text-center">Conversation</h1>
        <div class="row">
            <div class="col-xs-12" ng-repeat="conversation in conversationCtrl.conversation.messages">
                <h2>
                    <span ng-if="conversationCtrl.isClientInitiator($index)">You wrote:</span>
                    <span ng-if="!conversationCtrl.isClientInitiator($index)">Admin wrote:</span>
                </h2>
                <blockquote class="text-primary">
                    <p ng-bind="conversation.message"></p>
                    <footer>Added on <span ng-bind="conversation.updated_at | date:'medium'"></span></footer>
                </blockquote>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <h2>Reply here:</h2>
                <form name="replyForm" class="form" ng-submit="conversationCtrl.saveReply()" role="form">
                    <div class="form-group">
                        <label for="message"></label>
                        <textarea rows="6" class="form-control" ng-model="conversationCtrl.formData.message" required></textarea>
                        <p
                            ng-show="replyForm.message.$touched && replyForm.message.$error.required"
                            class="error">Your message is required.</p>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Reply</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop