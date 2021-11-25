import Alpine from 'alpinejs';
import { v4 as uuidv4 } from 'uuid';

require('./bootstrap');

window.Alpine = Alpine;

Alpine.data('uuid', () => ({
  generateUuid() {
    return uuidv4();
  },
}));

Alpine.start();
