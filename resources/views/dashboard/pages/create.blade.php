@extends('dashboard.layouts.container')
@section('content')
  <h1 class="mb-8 text-3xl font-extrabold text-gray-900">Add new recipe</h1>
  <p class="mb-8 text-sm font-medium text-red-600">* required field</p>
  <form action="{{route('dashboard.recipe.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="grid grid-cols-6 gap-6 mb-8">
      <div class="col-span-6 md:col-span-2 lg:col-span-3">
        <label for="title" class="block mb-1 text-base font-medium text-gray-900">
          Title<span class="{{$errors->has('title') ? 'text-red-600' : 'text-gray-900'}}">*</span>
        </label>
        <input
          type="text" name="title" autocomplete="off" value="{{old('title')}}"
          class="{{$errors->has('title') ? 'border-red-600' : 'border-gray-300'}} w-full rounded-lg"
        >
        @error('title')
          <p class="mt-2 text-sm font-light text-red-600">{{$message}}</p>
        @enderror
      </div>
      <div class="col-span-6 md:col-span-2 lg:col-span-1">
        <label for="category_id" class="block mb-1 text-base font-medium text-gray-900">
          Category<span class="{{$errors->has('title') ? 'text-red-600' : 'text-gray-900'}}">*</span>
        </label>
        <select name="category_id" id="category_id" class="w-full border-gray-300 rounded-lg">
          @foreach($categories as $category)
            @if(old('category_id') === (string)$category->id)
              <option value="{{$category->id}}" selected>{{$category->name}}</option>
            @else
              <option value="{{$category->id}}">{{$category->name}}</option>
            @endif
          @endforeach
        </select>
      </div>
      <div class="col-span-6 md:col-span-4">
        <label for="description" class="block mb-1 text-base font-medium text-gray-900">
          Description<span class="{{$errors->has('title') ? 'text-red-600' : 'text-gray-900'}}">*</span>
        </label>
        <textarea
          name="description" rows="1" autocomplete="off" value="{{old('description')}}"
          class="{{$errors->has('description') ? 'border-red-600' : 'border-gray-300'}} w-full rounded-lg"
        ></textarea>
        @error('description')
          <p class="mt-2 text-sm font-light text-red-600">{{$message}}</p>
        @enderror
      </div>
      <div
        x-data="{
          showImage: true,
          handleInputImageChange(e) {
            const image = e.target.files[0];
            const imageElementObject = {
              imageElement: $refs.thumbnailImage,
              image: image,
              previewMessageElement: $refs.previewMessageBox,
              imageContainerElement: $refs.thumbnailImageContainer
            };

            this.previewImage(imageElementObject);
          },
          previewImage(imageElementObject) {
            const {imageElement, image, previewMessageElement, imageContainerElement} = imageElementObject;
            
            if (image) {
              imageElement.src = URL.createObjectURL(image);
              
              this.showImage = true;
              imageContainerElement.style.display = 'block';
              previewMessageElement.style.display = 'none';
            } else {
              this.showImage = false;
            }
          }
        }"
        class="col-span-6 md:col-span-4">
        <label for="image" class="block mb-1 text-base font-medium text-gray-900">Upload thumbnail image</label>
        <div class="relative">
          <input
            x-on:change="handleInputImageChange"
            type="file" name="image" autocomplete="off"
            class="{{$errors->has('image') ? 'border-red-600' : 'border-gray-300'}} mb-4 block w-full overflow-hidden text-gray-900 bg-white border rounded-lg cursor-pointer focus:ring-blue-600 focus:outline-none focus:ring-2 focus:border-transparent"
          >
        </div>
        <div x-cloak x-ref="thumbnailImageContainer" style="display: none;"  class="relative overflow-hidden rounded-lg pb-1/2">
          <img
            x-ref="thumbnailImage"
            class="absolute block object-cover object-center w-full h-full rounded-lg"
            alt="Recipe preview"
            src="#"
          >
        </div>
        <div x-ref="previewMessageBox" style="display: block;" class="p-4 text-xs text-gray-600 bg-gray-200 border-2 border-gray-400 border-dashed rounded-lg sm:text-sm">
          <strong>Preview.</strong>&nbsp;You have not add any image or it is not available.
        </div>
        @error('image')
          <p class="mt-2 text-sm font-light text-red-600">{{$message}}</p>
        @enderror
      </div>
    </div>
    <div class="flex flex-row gap-x-4">
      <a href="{{route('dashboard.recipe.index')}}" class="flex-1 px-4 py-2 font-medium text-center text-gray-900 bg-white border border-gray-200 rounded-lg md:flex-none hover:bg-gray-100 hover:text-blue-700">Cancel</a>
      <button type="submit" class="flex-1 px-4 py-2 text-white bg-blue-600 rounded-lg md:flex-none hover:bg-blue-700">Add recipe</button>
    </div>
  </form>
@endsection