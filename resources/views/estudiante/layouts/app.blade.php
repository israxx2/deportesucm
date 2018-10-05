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

                <div class="copyright">
                    &copy; <script>document.write(new Date().getFullYear())</script>, Designed by <a href="http://www.invisionapp.com" target="_blank">Invision</a>. Coded by <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
                </div>
            </div>
        </footer>
      </div>
    </div>
  </body>

  @include('estudiante.layouts.script')

</html>
