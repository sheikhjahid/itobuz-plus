<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Itobuz+</title>
  <meta name="description" content="Admin, Dashboard, Bootstrap, Bootstrap 4, Angular, AngularJS" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- for ios 7 style, multi-resolution icon of 152x152 -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">
  <link rel="apple-touch-icon" href="../assets/images/logo.png">
  <meta name="apple-mobile-web-app-title" content="Flatkit">
  <!-- for Chrome on Android, multi-resolution icon of 196x196 -->
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- style -->
  <link rel="stylesheet" href="{{ URL::asset('css/custom.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ URL::asset('css/animate.min.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ URL::asset('font-awesome/css/font-awesome.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ URL::asset('css/glyphicons.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ URL::asset('css/material-design-icons.css') }}" type="text/css" />

  <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" type="text/css" />
  <!-- build:css ../assets/styles/app.min.css -->
  <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}" type="text/css" />
  <!-- endbuild -->
  <link rel="stylesheet" href="{{ URL::asset('css/font.css') }}" type="text/css" />
  <link rel="stylesheet"  href="{{URL::asset('css/jquery.datetimepicker.css')}}">
  <link rel="stylesheet" href="{{URL::asset('css/bootstrap-datetimepicker.css')}}">

</head>