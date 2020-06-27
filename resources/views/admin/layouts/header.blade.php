<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>لوحة التحكم</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link rel="stylesheet" href="{{ asset('public/admin/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('public/admin/dist/css/all.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('public/admin/dist/css/ionicons.css')}}">

    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('public/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('public/admin/dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('public/admin/dist/css/skins/_all-skins.min.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
      h1, h2 ,h3 ,h4 ,h5 ,h6 {
        text-align: right !important
      }
      .text-r {
        text-align: right  !important
      }

      input , select , option {
        text-align: right !important
      }

      table {
        padding: 10px;
        direction: rtl;
        background:#fff;
        box-shadow: 1px 1px 2px #ddd,-1px -1px 2px #ddd;
      }
      .table:hover {
        transition: all .3s ease;
        box-shadow: 3px 3px 20px #ddd,-3px -3px 20px #ddd;
      }
      table thead td {
        font-weight: bolder;
      }
      .container {
        text-align: right !important
      }
      .alert {
        margin:auto;
        margin-top:10px;
        width:95%;
        text-align: right !important
      }

      .content-header{
        text-align: right;
      }

      .content-header  button[data-target='#exampleModal']{
        display: inline-block !important;
        text-align: right !important;
      }

      button[data-target='#exampleModal']
      {
        margin-bottom: 15px;
      }
    </style>
    @stack('css')
  </head>
