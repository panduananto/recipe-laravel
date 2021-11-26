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
          type="text" name="title" autocomplete="off" placeholder="Delicious chicken soup" value="{{old('title')}}"
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
          name="description" rows="4" autocomplete="off" placeholder="Write a story about your recipe - who insipre you to create this recipe, what makes this recipe unique and special?"
          value="{{old('description')}}"
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
        }" class="col-span-6 md:col-span-4">
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
      <div x-data="uuid" class="col-span-6 md:col-span-4">
        <fieldset x-data="{
          ingredients: $persist([{id: generateUuid(), name: '', amount: ''}]).as('ingredients').using(sessionStorage),
          errors: {{ Js::from($errors->get('ingredients.*')) }},
          handleChangeIngredient(event, index) {
            let { name, value } = event.target;
            const nameString = name.substring(name.length - 5, name.length).slice(0, -1);
            const amountString = name.substring(name.length - 7, name.length).slice(0, -1); 
            const ingredientTemp = [...this.ingredients];

            if (name.includes('name')) {
              ingredientTemp[index][nameString] = value;
            } else {
              ingredientTemp[index][amountString] = value;
            }

            this.ingredients = ingredientTemp;
          },
          handleAddIngredient() {
            this.ingredients = [...this.ingredients, {id: generateUuid()}];
          },
          handleRemoveIngredient(id) {
            const ingredientTemp = [...this.ingredients];

            ingredientTemp.splice(
              this.ingredients.findIndex((ingredient) => ingredient.id === id),
              1
            );

            this.ingredients = ingredientTemp;
          }
        }">
          <legend class="block text-base font-medium text-gray-900">
            Ingredients<span class="{{$errors->has('title') ? 'text-red-600' : 'text-gray-900'}}">*</span>
          </legend>
          <div class="space-y-1">
            <template x-for="(ingredient, index) in ingredients" :key="ingredient.id">
              <div class="grid grid-cols-3 gap-x-1">
                <div class="col-span-3">
                  <div class="flex items-stretch gap-1">
                    <div class="relative flex-auto w-full">
                      <label x-bind:for="'ingredients[' + index + '][name]'" class="sr-only"></label>
                      <input
                        type="text" x-bind:name="'ingredients[' + index + '][name]'" autocomplete="off" placeholder="Garlic"
                        x-bind:value="ingredient.name" x-on:change="handleChangeIngredient($event, index)"
                        :class="errors['ingredients.' + index + '.name'] ? 'border-red-600' : 'border-gray-300'"
                        class="block w-full rounded-l-lg"
                      >
                    </div>
                    <div class="relative flex-auto">
                      <label x-bind:for="'ingredients[' + index + '][amount]'" class="sr-only"></label>
                      <input
                        type="text" x-bind:name="'ingredients[' + index + '][amount]'" autocomplete="off" placeholder="1 clove"
                        x-bind:value="ingredient.amount" x-on:change="handleChangeIngredient($event, index)"
                        :class="errors['ingredients.' + index + '.amount'] ? 'border-red-600' : 'border-gray-300'"
                        class="block w-full rounded-r-lg"
                      >
                    </div>
                    <div class="flex gap-1 ml-1">
                      <template x-if="ingredients.length - 1 === index">
                        <button type="button" x-on:click="handleAddIngredient()" class="px-2 text-green-600 bg-green-200 rounded-lg hover:bg-green-300">
                          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                          </svg>
                        </button>
                      </template>
                      <template x-if="ingredients.length !== 1">
                        <button type="button" x-on:click="handleRemoveIngredient(ingredient.id)" class="px-2 text-red-600 bg-red-200 rounded-lg hover:bg-red-300">
                          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd" />
                          </svg>
                        </button>
                      </template>
                    </div>
                  </div>
                </div>
              </div>
            </template>
          </div>
        </fieldset>
        @error('ingredients.*')
          <p class="mt-2 text-sm font-light text-red-600">{{$message}}</p>
        @enderror
      </div>
    </div>
    <div class="flex flex-row gap-x-4">
      <a x-on:click="sessionStorage.clear()" href="{{route('dashboard.recipe.index')}}" class="flex-1 px-4 py-2 font-medium text-center text-gray-900 bg-white border border-gray-200 rounded-lg md:flex-none hover:bg-gray-100 hover:text-blue-700">Cancel</a>
      <button type="submit" class="flex-1 px-4 py-2 text-white bg-blue-600 rounded-lg md:flex-none hover:bg-blue-700">Add recipe</button>
    </div>
  </form>
@endsection
