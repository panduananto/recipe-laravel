@extends('layouts.app')
@section('content')
  <div class="max-w-5xl px-8 mx-auto mt-4 space-y-4">
    <div>
      <h1 class="text-2xl font-bold text-gray-900">{{$recipe->title}}</h1>
      <p class="text-lg font-light text-gray-900">{{$recipe->description}}</p>
    </div>
  </div>
@endsection
