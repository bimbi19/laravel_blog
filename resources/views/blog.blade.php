<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
Selamat datang <br>
<h2>{{ $parsing}}</h2>

    @foreach($crud as $data)
    	<li>{{ $data->judul }}</li>
    	<ul>{{ $data->slug_judul }}</ul>


    @endforeach

</body>
</html>