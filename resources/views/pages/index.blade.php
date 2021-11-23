@extends('layouts.app')
@section('content')
  <div class="max-w-screen-xl px-8 mx-auto mt-14">
    <div class="grid grid-cols-6 gap-x-2">
      <div class="col-span-6 space-y-2">
          @if(count($recipes) == 0)
            <div class="py-4 text-center border border-gray-300 border-solid rounded-lg">We do not have any recipes to display right now.</div>
          @else
            <div class="grid grid-cols-12 gap-4">
              @foreach($recipes as $recipe)
              <div class="flex flex-row col-span-12 overflow-hidden border border-gray-300 border-solid rounded-lg shadow-sm sm:flex-col sm:col-span-6 md:col-span-4 lg:col-span-3">
                <div class="relative pb-0 pr-1/3 sm:pr-0 sm:pb-2/3">
                  <img class="absolute block object-cover object-center w-full h-full"
                    src="{{$recipe->image ? asset('storage/' . $recipe->image) : asset(generateThumbnailImage())}}"
                    alt="{{$recipe->title}} recipe"
                  >
                </div>
                <div class="px-4 py-3 overflow-hidden sm:p-4">
                  <a href="{{route('recipe.show', ['id' => $recipe->id])}}" class="block text-base font-extrabold text-gray-900 truncate hover:underline">{{$recipe->title}}</a>
                  <p class="mb-4 text-sm text-gray-900 truncate">{{$recipe->description}}</p>
                </div>
              </div>
              @endforeach
            </div>
          @endif
      </div>
    </div>
  </div>
@endsection