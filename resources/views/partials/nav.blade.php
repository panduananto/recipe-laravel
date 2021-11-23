<nav >
  <ul class="flex flex-row gap-x-4">
    <li class="relative" x-data="{open: false}">
      <button
        x-on:click="open = !open"
        type="button" id="profile-button" class="block overflow-hidden"
      >
        <div class="flex items-center justify-center w-10 h-10 text-xl font-medium text-white bg-blue-600 rounded-full">{{Str::substr(auth()->user()->name, 0, 1)}}</div>
      </button>
      <div
        x-cloak x-show="open" x-transition @click.outside="open = false"
        id="menu" class="absolute right-0 flex flex-col w-48 bg-white border border-gray-300 divide-y divide-gray-200 rounded-lg shadow-md top-12"
      >
        <div class="py-1">
          <a href="{{route('recipe.index')}}" class="block w-full px-4 py-2 font-light text-left text-gray-700 hover:bg-gray-100">Recipebook</a>
          <a href="#" class="block w-full px-4 py-2 font-light text-left text-gray-700 hover:bg-gray-100">Dashboard</a>
        </div>
        <div class="py-1">
          <form action="{{route('logout')}}" method="POST">
            @csrf
            <button type="submit" class="block w-full px-4 py-2 font-light text-left text-gray-700 hover:bg-gray-100">Logout</button>
          </form>
        </div>
      </div>
    </li>
  </ul>
</nav>