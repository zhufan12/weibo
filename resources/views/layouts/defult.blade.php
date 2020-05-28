<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title', 'Weibo App') - Laravel 入门教程</title>
    <link rel="stylesheet" href="/css/app.css">
  </head>
  <body>
    @include('layouts._herder')

    <div class="container">
      @yield('content')
    </div>
    @include('layouts._footer')
  </body>
</html>
