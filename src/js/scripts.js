if ('serviceWorker' in navigator) {
  	window.addEventListener('load', () => {
		const domainUrl = (window.location.host === "localhost") ? `${window.location.origin}/webpack_theme/` : window.location.origin;
		console.log("--SW--");
    	navigator.serviceWorker.register(`${domainUrl}/sw.js`);
  	});
}