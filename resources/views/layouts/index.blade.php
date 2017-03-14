<!DOCTYPE html>
<html>
<head>
	<title>Gilacoding | CRUD Laravel 5.2 dengan Materializecss</title>
	<link rel="stylesheet" href="{{asset('css/materialize.min.css')}}">
	<link href="{{asset('css/icon.css/')}}" rel="stylesheet">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	@section('css')

    @show
</head>
<body>
@section('header')
    @include('layouts.header')
@show



<div class="container">
	@yield('content')
</div>

<script src="{{asset('js/jquery-2.1.1.min.js')}}"></script>
<script src="{{asset('js/materialize.min.js')}}"></script>
<script type="text/javascript">
	(function($){
  $(function(){

    $('.button-collapse').sideNav();

  }); // end of document ready
})(jQuery); // end of jQuery name space

@section('js')

@show
</script>
</body>
</html>