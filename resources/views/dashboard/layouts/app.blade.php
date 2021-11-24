<!DOCTYPE html>
<html lang="en" class="h-full">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>recipebook | dashboard</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <script src="{{ asset('js/app.js') }}" defer></script>
  </head>

  <body class="flex flex-col min-h-full">
    <div x-data="{sidebarOpen: false}" class="relative flex flex-row flex-auto overflow-x-hidden">
      @include('dashboard.layouts.sidebar')
      <main id="main" class="flex flex-col w-full min-w-0 duration-150 ease-in-out bg-gray-100 transition-width">
        @include('dashboard.layouts.header')
        @yield('content-container')
      </main>
    </div>
  </body>
</html>