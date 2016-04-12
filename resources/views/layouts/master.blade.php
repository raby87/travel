<!-- Stored in resources/views/layouts/app.blade.php -->

<html>
<head>
    <title>旅游 - @yield('title')</title>
</head>
<body>
@section('sidebar')
    This is the master sidebar.
@show

<div class="container">
    @yield('content')
</div>
</body>
</html>