<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
       @include('mod.layouts.head')
</head>

  <body>
    <div class="wrapper">

       @include('mod.layouts.sidebar')
        <div class="main-panel">

           @include('mod.layouts.navbar')

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

  @include('mod.layouts.script')

</html>
