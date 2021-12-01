import Alpine from 'alpinejs';
import persist from '@alpinejs/persist';
import { v4 as uuidv4 } from 'uuid';

import './libs/trix.js';

require('./bootstrap');

window.Alpine = Alpine;

Alpine.plugin(persist);

Alpine.data('recipeImage', function () {
  return {
    showImage: true,
    previewImage(imageElementObject) {
      const { imageElement, image, previewMessageElement, imageContainerElement } =
        imageElementObject;

      if (image) {
        imageElement.src = URL.createObjectURL(image);

        this.showImage = true;
        imageContainerElement.style.display = 'block';
        previewMessageElement.style.display = 'none';
      } else {
        this.showImage = false;
      }
    },
    handleInputImageChange(event, imageElementRefs) {
      const image = event.target.files[0];
      const { thumbnailImageRef, previewMessageBoxRef, thumbnailImageContainerRef } =
        imageElementRefs;

      const imageElementObject = {
        imageElement: thumbnailImageRef,
        image,
        previewMessageElement: previewMessageBoxRef,
        imageContainerElement: thumbnailImageContainerRef,
      };

      this.previewImage(imageElementObject);
    },
  };
});

Alpine.data('recipeIngredients', function () {
  return {
    ingredients: this.$persist([{ id: uuidv4(), name: '', amount: '' }])
      .as('ingredients')
      .using(sessionStorage),
    async getIngredients(id) {
      let response = await fetch(`/dashboard/recipe/${id}/ingredients`);
      let responseJson = await response.json();
      let ingredients = responseJson[0].ingredients;

      return ingredients;
    },
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
      this.ingredients = [...this.ingredients, { id: uuidv4(), name: '', amount: '' }];
    },
    handleRemoveIngredient(id) {
      const ingredientTemp = [...this.ingredients];

      ingredientTemp.splice(
        this.ingredients.findIndex((ingredient) => ingredient.id === id),
        1
      );

      this.ingredients = ingredientTemp;
    },
  };
});

Alpine.start();
