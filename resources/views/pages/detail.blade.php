@extends('layouts.app')
@section('content')
  <div class="max-w-5xl px-8 mx-auto mt-4 space-y-8">
    <div class="relative overflow-hidden rounded-lg pb-1/2">
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
      <div class="pt-8">
        <h3 class="mb-8 text-2xl font-bold text-gray-900">Comments (2)</h3>
        <form action="">
          <div class="flex mb-16 gap-x-4">
            @auth
              <div class="flex items-center justify-center w-10 h-10 text-xl font-medium text-white bg-blue-600 rounded-full">
                {{Str::substr(auth()->user()->name, 0, 1)}}
              </div>
              <div class="flex-1">
                <label for=""></label>
                <textarea name="" id="" rows="4" placeholder="Add a comment..." class="w-full border border-gray-300 rounded-lg"></textarea>
                <button class="w-full px-4 py-2 text-lg text-white bg-blue-600 rounded-lg hover:bg-blue-700">Post</button>
              </div>
            @else
              <div>You need to <a href="{{route('login.index')}}" class="font-medium text-blue-600 hover:underline">log in</a> to post a comment</div>
            @endauth
          </div>
        </form>
        <ul class="space-y-10">
          <li class="flex gap-x-4">
            <div class="flex items-center justify-center w-10 h-10 text-xl font-medium text-white bg-blue-600 rounded-full">
              U
            </div>
            <div class="flex-1">
              <p class="text-lg font-semibold text-gray-900">Udnap Otnana</p>
              <p class="text-gray-700">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum reiciendis odit non impedit? Non fugit, dolorem facilis unde possimus accusamus.</p>
              <p class="mt-4 text-sm text-gray-400 font-base">1 days ago</p>
            </div>
          </li>
          <li class="flex gap-x-4">
            <div class="flex items-center justify-center w-10 h-10 text-xl font-medium text-white bg-blue-600 rounded-full">
              U
            </div>
            <div class="flex-1">
              <p class="text-lg font-semibold text-gray-900">Udnap Otnana</p>
              <p class="text-gray-700">Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti, obcaecati vero voluptas cupiditate delectus ipsa ut sint doloribus. Voluptas voluptate officia harum perferendis dolorem vitae natus ratione quibusdam animi expedita.</p>
              <p class="mt-4 text-sm text-gray-400 font-base">1 days ago</p>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
@endsection
