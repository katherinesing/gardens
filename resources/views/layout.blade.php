<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
</head>
	<body>

		<div>
		<nav class="navbar navbar-expand-lg navbar-light">

			@if (Auth::check())
			<p>You are logged in!</p>
			<a class="nav-link"  href="/gardens">Gardens</a>
			@else
			<a class="nav-link"  href="/login">Login</a>
			<a class="nav-link"  href="/register">Register</a>
			@endif

		</nav>
		</div>

		<div class="container-fluid">
		@yield('main')
		</div>

	</body>
</html>