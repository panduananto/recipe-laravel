<header class="fixed top-0 z-40 flex items-center w-full h-20 bg-white border-b border-gray-300 border-solid shadow-sm">
  <div class="flex flex-row items-center justify-between flex-1 h-full max-w-screen-xl px-8 mx-auto">
    <a href="{{route('recipe.index')}}" class="text-xl font-bold text-gray-900">recipebook</a>
    <ul class="flex flex-row items-center gap-x-6">
      <li><a href="{{route('recipe.index')}}" class="{{request()->routeIs('recipe.index') ? 'pb-[calc(1.5rem+2px)] border-b-4 border-blue-600' : ''}}">Home</a></li>
      <li><a href="{{route('recipe.create')}}" class="{{request()->routeIs('recipe.create') ? 'pb-[calc(1.5rem+2px)] border-b-4 border-blue-600' : ''}}">New Recipe</a></li>
    </ul>
  </div>
</header>