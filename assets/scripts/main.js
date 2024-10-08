// Get if the scroll position of an given element is within the visible area
// less then 0 means, its not yet in visible area ( further down )
// more then 1 means, its above the current visible area
// the float can be uset as percentual value, of how much of his "scoll lifetime¨ is over
function getScrollFactor(element) {
	const rect = element.getBoundingClientRect();

	if (rect.y > window.innerHeight) {
		console.log("Darunter");
	} else if ((window.innerHeight / 100) * (rect.y + rect.height) < 0) {
		console.log("Darüber");
	} else {
		let VisibilityProgress =
			(window.scrollY / (rect.top + window.scrollY + rect.height)) * 1;
		let percentVisibility = VisibilityProgress * 100; // percent version of factor
		return VisibilityProgress;
	}
}

// animation for the box backgrounds
// factor can be  a float between 0 and 1
function boxBackgroundParallax(element, factor) {
	let strength = 0.4;
	let ScaleTransformation = 1 + factor * strength;
	element.querySelector(".dw__grid_box_background").style.transform =
		"scale(" + ScaleTransformation + ")";
}

window.addEventListener("scroll", () => {
	const Boxes = document.querySelectorAll(".dw__grid_box");

	Boxes.forEach((Box) => {
		boxBackgroundParallax(Box, getScrollFactor(Box));
	});
});
