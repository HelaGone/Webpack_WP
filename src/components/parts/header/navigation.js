$(document).ready(function(){
	console.log('navigation');
	// Hace la animación del botón menú
	let btnMenu = document.getElementById('btn_menu');
	let btnCloseMenu = document.getElementById('btn_close_menu');
	if(btnMenu){
		btnMenu.addEventListener('click', ()=>{
			console.log("open");
			document.getElementById('main-nav').classList.toggle('open_nav');
		});
	}
	if(btnCloseMenu){
		btnCloseMenu.addEventListener('click', (e) => {
			console.log("close");
			document.getElementById('main-nav').classList.toggle('open_nav');
		});
	}

});