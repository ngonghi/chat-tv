@extends('home.layout.chat')

@section('content')
    <!-- chat sdk -->
    <script src="//developer.appear.in/scripts/appearin-sdk.0.0.4.min.js"></script>

    <!-- AngularJS -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.2/angular.min.js"></script>
    <!-- Firebase -->
    <script src="https://cdn.firebase.com/js/client/2.0.4/firebase.js"></script>
    <!-- AngularFire -->
    <script src="https://cdn.firebase.com/libs/angularfire/0.9.0/angularfire.min.js"></script>
    <!--main content start-->
    <section id="main-content" class="merge-left">
        <section class="wrapper">
            <div class="row">
                <div class="col-md-8">
                    <iframe src="https://appear.in/nghinv" width="100%" height="640" frameborder="0"></iframe>
                </div>
                <div class="col-md-4">
                    <!--chat start-->
                    <section class="panel">
                        <header class="panel-heading">
                            Chat <span class="tools pull-right">
        <a href="javascript:;" class="fa fa-chevron-down"></a>
        <a href="javascript:;" class="fa fa-cog"></a>
        </span>
                        </header>
                        <div class="panel-body">
                            <div class="chat-conversation" ng-controller="chatCtrl">
                                <ul class="conversation-list">
                                    <li class="clearfix" ng-repeat="chatMessage in chatMessages | limitTo:-100">
                                        <div class="chat-avatar">
                                            <img src="/images/user_chat.png" alt="male">
                                        </div>
                                        <div class="conversation-text">
                                            <div class="ctext-wrap">
                                                <i>@{{ chatMessage.name }}</i>
                                                <p>
                                                    @{{ chatMessage.message }}
                                                </p>
                                                <p>@{{ chatMessage.created_at }}</p>
                                            </div>
                                        </div>
                                    </li>
                                    {{--<li class="clearfix odd">--}}
                                    {{--<div class="chat-avatar">--}}
                                    {{--<img src="/admin/images/chat-user-thumb-f.png" alt="female">--}}
                                    {{--<i>10:00</i>--}}
                                    {{--</div>--}}
                                    {{--<div class="conversation-text">--}}
                                    {{--<div class="ctext-wrap">--}}
                                    {{--<i>Lisa Peterson</i>--}}
                                    {{--<p>--}}
                                    {{--Hi, How are you? What about our next meeting?--}}
                                    {{--</p>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</li>--}}
                                </ul>
                                <div class="row">
                                    <div class="col-xs-9">
                                        <input type="text" class="form-control chat-input" placeholder="Enter your text" ng-model="chatMes">
                                    </div>
                                    <div class="col-xs-3 chat-send">
                                        <button type="submit" class="btn btn-default" ng-keypress="sendChat2($event)" ng-click="sendChat()">Send</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!--chat end-->
                </div>
            </div>
        </section>
    </section>
    <!--main content end-->
    <!-- Placed js at the end of the document so the pages load faster -->
    <!--Core js-->
    <script src="/js/jquery.js"></script>
    <script src="/js/jquery-ui/jquery-ui-1.10.1.custom.min.js"></script>
    <script src="/bs3/js/bootstrap.min.js"></script>
    <script src="/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="/js/jquery.scrollTo.min.js"></script>
    <script src="/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
    <script src="/js/jquery.nicescroll.js"></script>
    <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="/js/flot-chart/excanvas.min.js"></script><![endif]-->
    <!--common script init for all pages-->
    <script src="/js/scripts.js"></script>
    <!--script for this page-->

    <!--Morris Chart-->
    <script src="/js/morris-chart/morris.js"></script>
    <script src="/js/morris-chart/raphael-min.js"></script>
    <script src="/js/morris.init.js"></script>
    <script src="/js/calendar/moment-2.2.1.js"></script>
    <script>
        var app = angular.module('app', ['firebase']);
        app.controller('chatCtrl', ['$scope', '$firebase', function($scope, $firebase) {
            var name = '{{Session::get('username')}}';
            var previousChat = '';
            $scope.name = name;
            $scope.chatMessage = "";
            var ref = new Firebase("https://chat-sorcererspiral.firebaseio.com/");
            var sync = $firebase(ref);
            $scope.chatMessages = sync.$asArray();
            $scope.sendChat = function () {
                if($scope.chatMes == previousChat || $scope.chatMes.length == 0) return;
                var chatTime = moment().format('YYYY/MM/DD hh:mm');
                var chatMessage = { name: name, message: $scope.chatMes, created_at:chatTime };
                $scope.chatMessages.$add(chatMessage);
                previousChat = $scope.chatMes;
                $scope.chatMes = "";
                $scope.$watch('chatMessages', function(){
                    $('.conversation-list').scrollTo('100%', '100%', {
                        easing: 'swing'
                    });
                });
            };
            $scope.sendChat2 = function ($event) {
                var keyCode = $event.which || $event.keyCode;
                if (keyCode === 13) {
                    console.log(111);
                    if($scope.chatMes == previousChat || $scope.chatMes.length == 0) return;
                    var chatMessage = { name: name, message: $scope.chatMes };
                    $scope.chatMessages.$add(chatMessage);
                    previousChat = $scope.chatMes;
                    $scope.chatMes = "";

                    $scope.$watch('chatMessages', function(){
                        $('.conversation-list').scrollTo('100%', '100%', {
                            easing: 'swing'
                        });
                    });
                }
            };
        }]);
    </script>
    </body>
    </html>
@stop