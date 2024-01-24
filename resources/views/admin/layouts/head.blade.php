<!DOCTYPE html>
<html lang="ar" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title',setting('website_name'))</title>
    <!-- Normalize -->
    <link rel="stylesheet" href="{{asset('admin-assets/css/normalize.css')}}" />
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('admin-assets/css/bootstrap.rtl.min.css')}}" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('admin-assets/css/all.min.css')}}" />
    <!-- Main Faile Css  -->
    <link rel="stylesheet" href="{{asset('admin-assets/css/main.css')}}" />
    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://cdn.jsdelivr.net/npm/rich-text-editor-vj@3.0.6/css/froala_editor.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css"/>
    <link
      href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-notify@0.5.5/dist/simple-notify.min.css" />
<!--<script src="{{asset('js/vue.js')}}"></script>-->

    @stack('css')
  </head>
  <body>
