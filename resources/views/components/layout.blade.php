<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- start linking  -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">

    <link rel="stylesheet" href="{{ asset('dashboard/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/css/app.css') }}">
    <link rel="icon" href="{{ asset('dashboard/img/log.png') }}">
    <title>NutFlix - admin</title>
</head>
<body>

    {{$slot}}
<!-- start script -->
<script src="{{asset('dashboard/js/jquery.min.js')}}"></script>
<script src="{{asset('dashboard/js/tether.min.js')}}"></script>
<script src="{{asset('dashboard/js/bootstrap.min.js')}}"></script>
<script src="{{asset('dashboard/js/highcharts.js')}}"></script>
<script src="{{asset('dashboard/js/chart.js')}}"></script>
<script src="{{asset('dashboard/js/app.js')}}"></script>
<!-- end screpting -->

</body>
</html>
