<div id="sidebar" x-cloak x-show="sidebarOpen" class="absolute inset-0 z-50 flex-grow flex-shrink-0 mt-20 overflow-x-hidden overflow-y-auto bg-white border-r border-gray-200 border-solid h-screen-20-1 md:h-screen w-72 md:mt-0 md:z-0 md:relative scrollbar-thumb-rounded-md scrollbar-thin scrollbar-thumb-gray-400 scrollbar-track-gray-300">
  <div id="navWrapper" class="h-full whitespace-nowrap">
    <ul class="p-8 space-y-3">
      <li>
        <a href="{{route('dashboard.profile.index')}}" class="flex items-center text-sm text-gray-600 hover:text-gray-900">
          <span class="mr-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
              <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
            </svg>
          </span>
          profile
        </a>
      </li>
      <li>
        <a href="{{route('dashboard.recipe.index')}}" class="flex items-center text-sm text-gray-600 hover:text-gray-900">
          <span class="mr-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
              <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z" />
            </svg>
          </span>
          my recipes
        </a>
      </li>
    </ul>
  </div>
</div>