if ('serviceWorker' in navigator) {
  	// Use the window load event to keep the page load performant
  	window.addEventListener('load', () => {
    	navigator.serviceWorker.register('./wp-content/themes/base-theme/dist/service-worker.js');
  	});
}

import {square, cube} from './functions.js';

// console.log(square(7));
// console.log(cube(8));