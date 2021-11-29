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
        <h3 class="mb-2 text-2xl font-bold text-gray-900">Ingredients</h3>
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
        <h3 class="mb-8 text-2xl font-bold text-gray-900">Comments ({{count($comments)}})</h3>
        <div class="space-y-8">
          @if(count($comments) == 0)
            <div class="p-4 mb-8 text-center bg-gray-200 rounded-lg ">There is no comments on this recipe.</div>
          @endif
          <form action="{{route('recipe.comment.store', ['id' => $recipe->id])}}" method="POST">
            @csrf
            <div class="flex gap-x-4">
              @auth
                <div class="flex items-center justify-center w-10 h-10 text-xl font-medium text-white bg-blue-600 rounded-full">
                  {{Str::substr(auth()->user()->name, 0, 1)}}
                </div>
                <div class="flex-1">
                  <label for="body_comment"></label>
                  <textarea name="body_comment" rows="4" placeholder="Add a comment..." class="w-full mb-2 border border-gray-300 rounded-lg"></textarea>
                  <button type="submit" class="w-full px-4 py-2 text-lg text-white bg-blue-600 rounded-lg hover:bg-blue-700">Post</button>
                </div>
              @else
                <div>You need to <a href="{{route('login.index')}}" class="font-medium text-blue-600 hover:underline">log in</a> to post a comment</div>
              @endauth
            </div>
          </form>
          @if(count($comments) != 0)
            <ul class="space-y-10">
              @foreach($comments as $comment)
              <li class="flex gap-x-4">
                <div class="flex items-center justify-center w-10 h-10 text-xl font-medium text-white bg-blue-600 rounded-full">
                  {{Str::substr($comment->user->name, 0, 1)}}
                </div>
                <div class="flex-1">
                  <p class="text-lg font-semibold text-gray-900">{{$comment->user->name}}</p>
                  <p class="text-gray-700">{{$comment->body}}</p>
                  <p class="mt-4 text-sm text-gray-400 font-base">{{$comment->created_at->diffForHumans()}}</p>
                </div>
              </li>
              @endforeach
            </ul>
          @endif
        </div>
      </div>
    </div>
  </div>
@endsection
