<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    {{--<link rel="shortcut icon" href="/admin/images/favicon.png">--}}
    <title>Chat</title>
    <!--Core CSS -->
    <link href="/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="/js/jquery-ui/jquery-ui-1.10.1.custom.min.css" rel="stylesheet">
    <link href="/css/bootstrap-reset.css" rel="stylesheet">
    <link href="/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="/css/clndr.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/style-responsive.css" rel="stylesheet"/>
</head>
<body ng-app="app">
<section id="container">
<!--header start-->
@include('home.common.chat-header')
<!--header end-->
<!--main content start-->
@section('content')
@show