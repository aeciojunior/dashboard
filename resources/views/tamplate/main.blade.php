<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">
    <title>
        @yield('titulo')
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/nucleo-svg.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/argon-dashboard.css')}}">
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('css/argon-dashboard.css?v=2.0.4') }}" rel="stylesheet" />
    <style>
        .async-hide {
          opacity: 0 !important
        }
      </style>
      



</head>

@if (auth()->hasUser() && session()->get('cnpj_loja'))

    <body class="g-sidenav-show   bg-gray-100">

        @stack('sidbar')
        <main class="main-content position-relative border-radius-lg ">
            @stack('navbar')
            @yield('conteudo')
        </main>


        @include('tamplate.javascript')
        @stack('javascript')

        @if (Session::has('msg-error'))
            <script>
                function error() {
                    var error = "{!! Session::get('msg-error') !!}"
                    return swal("Ops,Ouve um erro!", error, "error");
                }
                setTimeout(function() {
                    // o teu código mouse hover aqui
                    error();
                }, 400);
            </script>
        @endif
        @if (Session::has('msg-success'))
            <script>
                function success() {
                    var success = "{!! Session::get('msg-success') !!}"
                    return swal("Tudo ok!", success, "success");
                }
                setTimeout(function() {
                    // o teu código mouse hover aqui
                    success();
                }, 400)
            </script>
        @endif
    </body>
@else

    <body>
        @yield('conteudo')

        @include('tamplate.javascript')
        <script src="{{ asset('js/sweetalert.min.js')}}"></script>
        @if (Session::has('msg-error'))
            <script>
                function error() {
                    var error = "{!! Session::get('msg-error') !!}"
                    return swal("Ops,Ouve um erro!", error, "error");
                }
                setTimeout(function() {
                    // o teu código mouse hover aqui
                    error();
                }, 400);
            </script>
        @endif
        @if (Session::has('msg-success'))
            <script>
                function success() {
                    var success = "{!! Session::get('msg-success') !!}"
                    return swal("Tudo ok!", success, "success");
                }
                setTimeout(function() {
                    // o teu código mouse hover aqui
                    success();
                }, 400)
            </script>
        @endif
    </body>

@endif

</html>
