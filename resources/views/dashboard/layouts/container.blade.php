@extends('dashboard.layouts.app')
@section('content-container')
  <div class="flex flex-col flex-auto min-w-0">
    <div class="flex-auto px-10 py-8 overflow-y-auto h-screen-20-1 scrollbar-thumb-rounded-md scrollbar-thin scrollbar-thumb-gray-400 scrollbar-track-gray-300">
      <div class="max-w-7xl">
        @yield('content')
      </div>
    </div>
  </div>
@stop