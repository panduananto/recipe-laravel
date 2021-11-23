<header class="fixed top-0 z-40 flex items-center w-full h-20 bg-white border-b border-gray-300 border-solid shadow-sm">
  <div class="flex flex-row items-center justify-between flex-1 h-full max-w-screen-xl px-8 mx-auto">
    <a href="{{route('recipe.index')}}" class="text-xl font-bold text-gray-900">recipebook</a>
      @if(in_array(Request::url(), [route('login.index'), route('register.index')]))
        <a href="{{route('recipe.index')}}" class="font-medium text-gray-500 hover:text-gray-900">
          Enter as guest
        </a>
      @else
        <a href="{{route('login.index')}}" class="font-medium text-gray-500 hover:text-gray-900">
          Log in
        </a>
      @endif
  </div>
</header>