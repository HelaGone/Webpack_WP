window.addEventListener('load', ()=>{
	console.log('navigation functions');

	let open_menu_button = document.getElementById('open_menu');
	open_menu_button.addEventListener('click', ()=>{
		console.log('menu btn click');

		console.log(document.querySelector('.menu-main-menu'));

	});
});