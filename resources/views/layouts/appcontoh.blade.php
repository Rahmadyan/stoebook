<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>@yield('title')</title>
		
	</head>
	<body>
		<ul>
			@section('sidebar')
			
			  <li>HTML</li>
			  <li>CSS</li>
			  <li>JS</li>
			  <li>JSs</li>
			@show
		</ul>
		<div class="container">
			@yield('content')
		</div>
		<!-- yield memberikan ruang pada halaman ini yang datanya akan kita isi dari page yang berbeda sesuai dengan title atau judul halaman 
		<!-- section('sidebar') kita akan meminjam bagian ini untuk kita tampilkan di page yang lain -->
	</body>
</html>

