<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('JUDUL', 'Home')</title>
    @include('layout.link')

</head>

<body class="sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('layout.navbar')
        @include('layout.sidebar')
        
        <div class="content-wrapper">
            <div class="content pt-3">
                @yield('CONTENT')
            </div>
        </div>
        
        @include('layout.footer')
    </div>
    @include('layout.script')
</body>

</html>
