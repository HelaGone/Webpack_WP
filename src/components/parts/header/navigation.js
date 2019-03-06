$(document).ready(function(){
	console.log('navigation');
	// Hace la animación del botón menú
	let btnMenu = document.getElementById('btn_menu');
	btnMenu.addEventListener('click', ()=>{
		btnMenu.classList.toggle('change');
	});

});