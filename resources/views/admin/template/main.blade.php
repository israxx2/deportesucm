<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title', 'Default') | Panel de Administración</title>
<meta name="description" content="">
<meta name="author" content="">

<link rel="stylesheet" type="text/css"  href="{{ asset('bootstrap-4.1/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome/css/font-awesome.css') }}">


</head>
<body>

    @include('admin.template.partials.nav')

    <div class="container-fluid">

        @yield('content')

    </div>

</body>
<script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
<script type="text/javascript" src="{{ asset('js/jquery.1.11.1.js') }}"></script>
<script type="text/javascript" src="{{ asset('bootstrap-4.1/js/bootstrap.js') }}"></script>
<script defer src="{{ asset('svg-with-js/js/fontawesome-all.js') }}"></script>
</html>
