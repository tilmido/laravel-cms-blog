<html>
    <head>
        <title>Admin area</title>
        <meta charset="utf-8"/>

        <script src="{{ URL::to('js/jquery.min.js') }}"></script>
        <script src="{{ URL::to('bootstrap/bootstrap.min.js') }}"></script>
        <link rel="stylesheet" href="{{ URL::to('src/css/main.css') }}"/>
        <link rel="stylesheet" href="{{ URL::to('bootstrap/bootstrap.min.css') }}"/>
        <script type="text/javascript">
var token = '{{ Session::token() }}';
var baseUrl = "{{ URL::to('/')}}";
        </script>
        @yield('style')
    </head>
    <body>
        @include('includes.admin.header')
        @yield('content')
        @yield('scripts')
        @include('includes.admin.footer')

    </body>

</html>