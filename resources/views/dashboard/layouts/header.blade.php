<header class="sticky top-0 z-50 flex items-center justify-between h-20 px-8 bg-white border-b border-gray-200 border-solid flex-0">
  <div class="flex">
    <button x-on:click="sidebarOpen = !sidebarOpen" type="button" class="inline-block mr-3 text-gray-500">
      <svg x-show="!sidebarOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
      </svg>
      <svg x-cloak x-show="sidebarOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
      </svg>
    </button>
    <a href="{{route('dashboard.profile.index')}}" class="text-xl font-bold text-gray-900">dashboard</a>
  </div>
  @include('partials.nav')
</header>