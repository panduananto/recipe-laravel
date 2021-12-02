@extends('layouts.app')
@section('content')
  <div class="max-w-5xl px-8 mx-auto mt-4 space-y-8">
    <div class="relative overflow-hidden rounded-lg pb-1/2">
      <img
        class="absolute block object-cover object-center w-full h-full"
        src="{{ $recipe->image ? asset('storage/' . $recipe->image) : asset(generateThumbnailImage()) }}"
        alt="{{ $recipe->title }} recipe"
      >
    </div>
    <div class="space-y-8 divide-y-2 divide-blue-600">
      <div class="space-y-2">
        <h1 class="text-4xl font-extrabold text-gray-900">{{ $recipe->title }}</h1>
        <p class="text-lg text-gray-900">{{ $recipe->description }}</p>
      </div>
      <div class="pt-8">
        <h3 class="mb-2 text-2xl font-bold text-gray-900">Ingredients</h3>
        <ul class="divide-y divide-gray-300 ">
          @foreach($recipe->ingredients as $ingredient)
            <li class="py-4 text-gray-900">
              <strong>{{ $ingredient['amount'] }}</strong>&nbsp;{{ $ingredient['name'] }}
            </li>
          @endforeach
        </ul>
      </div>
      <div class="pt-8">
        {!! $recipe->body_text !!}
      </div>
      <div
        x-data="recipeComments"
        x-init="getComments({{ $recipe->id }})"
        class="pt-8"
      >
        <h3 class="mb-8 text-2xl font-bold text-gray-900">Comments ({{ count($recipe->comments) }})</h3>
        <template x-if="comments.length === 0">
          <div>Loading...</div>
        </template>
        <template x-if="comments.length !== 0">
          <div class="space-y-8">
            <template x-if="comments.data.length === 0">
              <div class="p-4 mb-8 text-center bg-gray-200 rounded-lg ">There is no comments on this recipe.</div>
            </template>
            <form action="{{ route('recipe.comments.store', ['id' => $recipe->id]) }}" method="POST">
              @csrf
              <div class="flex gap-x-4">
                @auth
                  <div class="flex items-center justify-center w-10 h-10 text-xl font-medium text-white uppercase bg-blue-600 rounded-full">
                    {{ Str::substr(auth()->user()->name, 0, 1) }}
                  </div>
                  <div class="relative flex-1">
                    <label for="body" class="sr-only">Comment</label>
                    <textarea name="body" rows="4" placeholder="Add a comment..." class="w-full mb-2 border border-gray-300 rounded-lg"></textarea>
                    <button type="submit" class="w-full px-4 py-2 text-lg text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                      Post
                    </button>
                  </div>
                @else
                  <div>You need to <a href="{{route('login.index')}}" class="font-medium text-blue-600 hover:underline">log in</a> to post a comment</div>
                @endauth
              </div>
            </form>
            <ul class="space-y-10">
              <template x-for="comment in comments.data">
                <li class="flex gap-x-4">
                  <div x-text="comment.user.name.substring(0, 1)" class="flex items-center justify-center w-10 h-10 text-xl font-medium text-white uppercase bg-blue-600 rounded-full"></div>
                  <div class="flex-1">
                    <p x-text="comment.user.name" class="text-lg font-semibold text-gray-900"></p>
                    <p x-text="comment.body" class="text-gray-700"></p>
                  </div>
                </li>
              </template>
            </ul>
            <div class="flex flex-row items-center justify-center">
              <template x-if="comments.next_page_url !== null && loading === false">
                <button x-on:click="loadMoreComments({{$recipe->id}}, comments.from)" class="flex flex-row items-center px-4 py-2 font-medium text-center text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700">
                  <span>Load more comments</span>
                </button>
              </template>
              <template x-if="comments.next_page_url !== null && loading === true">
                <button x-on:click="loadMoreComments({{$recipe->id}}, comments.from)" class="flex flex-row items-center px-4 py-2 font-medium text-center text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700">
                  <span>Load more comments</span>
                  <span>
                    <svg class="w-5 h-5 ml-3 text-blue-600 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                      <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                      <path class="opacity-100" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                  </span>
                </button>
              </template>
              <template x-if="comments.data.length !== 0 && comments.next_page_url === null && loading === false">
                <span class="px-4 py-2 font-medium text-center text-gray-900 bg-white border border-gray-200 rounded-lg">
                  No more comments
                </span>
              </template>
            </div>
          </div>
        </template>
      </div>
    </div>
  </div>
@endsection
