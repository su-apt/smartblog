<!doctype html>
<html lang="{{config('app.locale')}}" dir="{{config('app.direction')}}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title') </title>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.rtl.min.css" integrity="sha384-XfhC/Sid4FIGSXYebcOtcSCRFkd/zZzAMVipf0bNWucloRvcKK2/dpVWodQbQ1Ek" crossorigin="anonymous"></head>
<link rel="stylesheet" href="{{ asset('assets/app.css') }}">
<head>
  <!--load all Font Awesome styles -->
  <link href="{{ asset('assets/css/all.css') }}" rel="stylesheet" />
  <style>
    .FixedHeightContainer
{
  float:right;
  height: 250px;
  width:250px;
  overflow-y: scroll;
}

/*SCROLLBAR MODIFICATIONS*/

.FixedHeightContainer::-webkit-scrollbar {
    width: 8px;
}

.FixedHeightContainer::-webkit-scrollbar-thumb {
    background: #909090;
    border-radius: 8px;
}
.FixedHeightContainer::-webkit-scrollbar-track {
    background: #FFFFFF;
}

    </style>
</head>



<body>
