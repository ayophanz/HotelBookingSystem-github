
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/fontawesome.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/brands.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/solid.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/customMain.css') }}">
  

  <!--load css on specific page-->

  @if (\Request::is('new-room') || \Request::is('edit-room/*') || \Request::is('delete-room/*') || \Request::is('new-room-type') || \Request::is('edit-room-type/*') || \Request::is('new-room-type-price') || \Request::is('edit-room-type-price/*') || \Request::is('edit-hotel-details/*') || \Request::is('new-book') || \Request::is('new-book') || \Request::is('edit-book/*')) 
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/select2.min.css') }}">
  <style type="text/css">
    .custom-alert-error{
      background-color: rgba(220, 53, 69, 0.23137254901960785) !important;
      border-radius: 0px !important;
      color: #a21212 !important;  
      margin-top: 5px;
    }
    .preview-wrapper {
        width: 100%;
        margin-top: 10px;
        text-align: center;
    }
    img#preview {
      width: 50%;
    }
  </style>
  @endif

  @if (\Request::is('/') || \Request::is('room-manager') || \Request::is('price-list-manager'))
  <link rel="stylesheet" href="{{ asset('/dist/thirdPartyCss&Js/lightbox.vue.min.css') }}">
  <style type="text/css">
    .img-hotel{
        width: 50px;
        background-repeat: no-repeat;
        background-size: cover;
        height: 50px;
        border-radius: 100px;
        border: 1px solid #007bff;
        margin: 0px;
        cursor: pointer;
    }

    .lightbox__thumbnail img {
        border-radius: 100px;
        width: 50px !important;
        height: 50px;
    }
  </style>
  @endif

  @if(\Request::is('new-book') || \Request::is('edit-book/*'))
  <link rel="stylesheet" type="text/css" href="{{asset('/dist/thirdPartyCss&Js/datepicker.min.css')}}" />
  @endif

  @if(\Request::is('booking-manager'))
    <link rel="stylesheet" href="{{asset('/dist/thirdPartyCss&Js/fullcalendar.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('/dist/thirdPartyCss&Js/sweetalert2.min.css')}}"/>
    <style type="text/css">
      .calendar-wrapper {
          margin: auto;
          border: 1px solid #d8d8d8;
          margin-bottom: 50px;
          border-radius: 2px;
      }
      .fc-ltr .fc-basic-view .fc-day-top .fc-day-number {
          margin-right: 10px;
      }
      a.fc-day-grid-event.fc-h-event.fc-event.fc-start.fc-end {
          border-radius: 0px;
          color: white;
          border: 0px;
      }
      div#swal2-content ul li {
          color: #3fc3ee;
      }
      div#swal2-content ul li span {
          color: #545454;
      }
      div#swal2-content ul li.title-list span {
        font-weight: 700;
      }
      div#swal2-content ul li.title-list {
          margin-top: 15px;
      }
      div#swal2-content ul li {
          list-style: none;
          text-align: left;
      }
      .nav-pills .nav-link {
        border-radius: 0px !important;
      }
    </style>
  @endif
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a data-slide="true" class="text-dark" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->