@extends('layouts.app')
@section('content')
  <div class="max-w-lg px-8 mx-auto mt-16">
    <div class="mb-8 space-y-2">
      <h3 class="text-3xl font-extrabold text-gray-900">Log in</h3>
      <p class="text-gray-900">Don't have an account? <a href="{{route('register.index')}}" class="font-medium text-blue-600 hover:underline">Register here</a></p>
    </div>
    @if(session()->has('loginError'))
      <div class="flex p-4 mb-4 text-sm text-red-600 bg-red-200 rounded-lg">
        <svg class="inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
        <div>
          {{session('loginError')}}
        </div>
      </div>
    @endif
    @if(session()->has('registrationSuccess'))
      <div class="flex p-4 mb-4 text-sm text-green-600 bg-green-200 rounded-lg">
        <svg class="inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
        <div>
          {{session('registrationSuccess')}}
        </div>
      </div>
    @endif
    <form action="{{route('login.authenticate')}}" method="POST">
      @csrf
      <div class="mb-8 space-y-6">
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
      <button type="submit" class="block w-full py-4 font-medium text-white bg-blue-600 rounded-full hover:bg-blue-700">Log in</button>
    </form>
  </div>
@endsection