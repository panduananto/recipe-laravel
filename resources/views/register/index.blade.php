@extends('layouts.app')
@section('content')
  <div class="max-w-lg px-8 mx-auto mt-16">
    <div class="mb-8 space-y-2">
      <h3 class="text-3xl font-extrabold text-gray-900">Register</h3>
      <p class="text-gray-900">Already have an account? <a href="{{route('login.index')}}" class="font-medium text-blue-600 hover:underline">Log in here</a></p>
    </div>
    <form action="{{route('register.store')}}" method="POST">
      @csrf
      <div class="mb-8 space-y-6">
        <div>
          <label for="name" class="block mb-1 text-sm font-medium text-gray-700">Full name</label>
          <input
            type="text" name="name" autocomplete="off" value="{{old('name')}}"
            class="{{$errors->has('name') ? 'border-red-600' : 'border-gray-300'}} w-full rounded-lg"
          >
          @error('name')
            <p class="mt-2 text-sm font-light text-red-600">{{$message}}</p>
          @enderror
        </div>
        <div>
          <label for="email" class="block mb-1 text-sm font-medium text-gray-700">Email address</label>
          <input
            type="email" name="email" autocomplete="off" value="{{old('email')}}"
            class="{{$errors->has('email') ? 'border-red-600' : 'border-gray-300'}} w-full rounded-lg"
          >
          @error('email')
            <p class="mt-2 text-sm font-light text-red-600">{{$message}}</p>
          @enderror
        </div>
        <div>
          <label for="password" class="block mb-1 text-sm font-medium text-gray-700">Password</label>
          <input
            type="password" name="password" autocomplete="off"
            class="{{$errors->has('password') ? 'border-red-600' : 'border-gray-300'}} w-full rounded-lg"
          >
          @error('password')
            <p class="mt-2 text-sm font-light text-red-600">{{$message}}</p>
          @enderror
        </div>
      </div>
      <button type="submit" class="block w-full py-4 font-medium text-white bg-blue-600 rounded-full hover:bg-blue-700">Create your free account</button>
    </form>
  </div>
@endsection