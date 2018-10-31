<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
       @include('estudiante.layouts.head')
</head>

  <body>
    <div class="wrapper">

       @include('estudiante.layouts.sidebar')
        <div class="main-panel">

           @include('estudiante.layouts.navbar')

            <div class="panel-header panel-header-sm">
            </div>

            <div class="content">
                @yield('content')
            </div>

        <footer class="footer" >
            <div class="container-fluid">

                
            </div>
        </footer>
      </div>
    </div>
  </body>

  @include('estudiante.layouts.script')

</html>
