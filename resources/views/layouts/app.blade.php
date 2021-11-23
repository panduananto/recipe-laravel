<!DOCTYPE html>
<html lang="en" class="h-full">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>recipebook</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <script src="{{ asset('js/app.js') }}" defer></script>
  </head>
  <body class="flex flex-col min-h-full">
    @include('layouts.header')
    <main class="flex-1 pt-20 pb-16">@yield('content')</main>
    <footer class="flex items-center justify-center h-16 mt-auto text-center text-white bg-blue-600">
      recipebook
    </footer>
  </body>
</html>
