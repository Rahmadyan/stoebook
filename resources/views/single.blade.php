<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<h1>Selamat datang di blog</h1>
	<h2>{{$blog}}</h2>
	<h3>{{$user}}</h3>

	@foreach ($users as $key)
		<li>{{$key}}</li>
		
	@endforeach


</body>
</html>