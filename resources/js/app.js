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
}));

Alpine.start();
