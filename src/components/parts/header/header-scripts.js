import logo from '../../../img/logo_cube.png';

$(document).ready(function(){
	console.log('header js');

	console.log(logo);
	// Asigna la imagen al elemento con el id logo
	let div_logo = document.getElementById('logo');	
	div_logo.style.backgroundImage = `url(${logo})`;

});