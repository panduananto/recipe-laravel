@extends('dashboard.layouts.container')
@section('content')
  <div class="relative mb-4 overflow-hidden rounded-lg pb-1/2">
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
@stop