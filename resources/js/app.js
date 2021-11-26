import Alpine from 'alpinejs';
import persist from '@alpinejs/persist';
import { v4 as uuidv4 } from 'uuid';

require('./bootstrap');

window.Alpine = Alpine;

Alpine.plugin(persist);

Alpine.data('uuid', () => ({
  generateUuid() {
    return uuidv4();
  },
  async getIngredients(id) {
    let response = await fetch(`/dashboard/recipe/${id}/ingredients`);
    let responseJson = await response.json();
    let ingredients = responseJson[0].ingredients;

    return ingredients;
  },
}));

Alpine.start();
