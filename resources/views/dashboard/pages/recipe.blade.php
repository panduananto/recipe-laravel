@extends('dashboard.layouts.container')
@section('content')
  <div class="flex flex-row items-center justify-between mb-4">
    <p class="text-3xl font-extrabold">My recipes</p>
    <a href="{{route('dashboard.recipe.create')}}" class="px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">Add new recipe</a>
  </div>
  <div class="flex flex-col lg:shadow lg:rounded-lg">
    <div class="overflow-x-auto">
      <div class="inline-block min-w-full align-middle">
        <div class="overflow-hidden border-b border-gray-200 lg:rounded-lg">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase whitespace-nowrap">Title</th>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase whitespace-nowrap">Category</th>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase whitespace-nowrap">Created At</th>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase whitespace-nowrap">Updated At</th>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase whitespace-nowrap"><span class="sr-only">Action</span></th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              @if(count($recipes) == 0)
                <tr>
                  <td colspan="5" class="px-6 py-4 text-center whitespace-nowrap">
                    <p class="text-sm text-gray-900">You do not have any recipe right now.</p>
                  </td>
                </tr>
              @else
                @foreach($recipes as $recipe)
                  <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <p class="text-sm text-gray-900">{{$recipe->title}}</p>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <p class="text-sm text-gray-900">{{$recipe->category->name}}</p>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <p class="text-sm text-gray-900">{{$recipe->created_at}}</p>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <p class="text-sm text-gray-900">{{$recipe->updated_at}}</p>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center justify-end space-x-4">
                        <a href="{{route('dashboard.recipe.show', ['id' => $recipe->id])}}" class="text-sm font-medium text-blue-600">Preview</a>
                        <a href="{{route('dashboard.recipe.edit', ['id' => $recipe->id])}}" class="text-sm font-medium text-blue-600">Edit</a>
                        <form action="{{route('dashboard.recipe.destroy', ['id' => $recipe->id])}}" method="POST">
                          @method('DELETE')
                          @csrf
                          <button type="submit" class="text-sm font-medium text-blue-600">Delete</button>
                        </form>
                      </div>
                    </td>
                  </tr>
                @endforeach
              @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection