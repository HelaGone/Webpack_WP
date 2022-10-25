document.addEventListener("DOMContentLoaded", function(){
	console.log('navigation');
	// Hace la animación del botón menú
	let btnMenu = document.getElementById('btn_menu');
	let btnCloseMenu = document.getElementById('btn_close_menu');
	const nav = document.getElementById('main-nav');
	if(btnMenu){
		btnMenu.addEventListener('click', ()=>{
			if(nav){
				nav.classList.toggle('open_nav');
			}
		});
	}
	if(btnCloseMenu){
		btnCloseMenu.addEventListener('click', (e) => {
			if(nav){
				nav.classList.toggle('open_nav');
			}
		});
	}

});