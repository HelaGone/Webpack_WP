console.log("single");
const btnCopyLink = document.getElementById('copy_link');
if(btnCopyLink){
	btnCopyLink.addEventListener('click', (e) => {
		const target = e.currentTarget;
		if(target){
			const link = target.dataset.link;
			navigator.clipboard.writeText(link);
			const tooltip = document.querySelector('.clipboard span')
			tooltip.style.display = "inline-block";
			setTimeout(() => {
				tooltip.style.display = "none";
			}, 1500);
		}
	});
}
