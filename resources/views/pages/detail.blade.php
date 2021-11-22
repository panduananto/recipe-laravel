@extends('layouts.app')
@section('content')
  <div class="max-w-5xl px-8 mx-auto mt-4 space-y-4">
    <div class="relative overflow-hidden rounded-lg pb-1/2">
      <img
        class="absolute block object-cover object-center w-full h-full"
        src="{{$recipe->image ? asset('storage/' . $recipe->image) : asset(generateThumbnailImage())}}"
        alt="{{$recipe->title}} recipe"
      >
    </div>
    <div>
      <h1 class="text-2xl font-bold text-gray-900">{{$recipe->title}}</h1>
      <p class="text-lg font-light text-gray-900">{{$recipe->description}}</p>
    </div>
  </div>
@endsection
