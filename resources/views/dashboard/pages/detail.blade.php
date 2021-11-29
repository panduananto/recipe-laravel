@extends('dashboard.layouts.container')
@section('content')
  <div class="relative mb-4 overflow-hidden rounded-lg pb-1/2">
    <img
      class="absolute block object-cover object-center w-full h-full"
      src="{{$recipe->image ? asset('storage/' . $recipe->image) : asset(generateThumbnailImage())}}"
      alt="{{$recipe->title}} recipe"
    >
  </div>
  <div class="space-y-8 divide-y-2 divide-blue-600">
    <div class="space-y-2">
      <h1 class="text-4xl font-extrabold text-gray-900">{{$recipe->title}}</h1>
      <p class="text-lg text-gray-900">{{$recipe->description}}</p>
    </div>
    <div class="pt-8">
      <h3 class="mb-2 text-2xl font-bold text-gray-900">Igredients</h3>
      <ul class="divide-y divide-gray-300 ">
        @foreach($recipe->ingredients as $ingredient)
          <li class="py-4 text-gray-900">
            <strong>{{$ingredient['amount']}}</strong>&nbsp;{{$ingredient['name']}}
          </li>
        @endforeach
      </ul>
    </div>
    <div class="pt-8">
      {!! $recipe->body_text !!}
    </div>
  </div>
@stop