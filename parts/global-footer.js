var DW_FOOTER = document.querySelector(".dw__global_footer");
var FOOTER_OFFSET = 0;

var FOOTER_HEIGHT = DW_FOOTER.clientHeight;
document.querySelector("body").style.marginBottom =
	FOOTER_HEIGHT - FOOTER_OFFSET + "px";

window.addEventListener("resize", () => {
	FOOTER_HEIGHT = DW_FOOTER.clientHeight;
	document.querySelector("body").style.marginBottom =
		FOOTER_HEIGHT - FOOTER_OFFSET + "px";
});

var FOOTER_OVERLAY = document.querySelector(".dw__global_footer_overlay");
var FOOTER_OVERLAY_DIVIDER = FOOTER_OVERLAY.querySelector("svg");
var BODY_COLOR = document.querySelector("body").style.backgroundColor;
//console.log(BODY_COLOR);

if (BODY_COLOR) {
	FOOTER_OVERLAY.style.backgroundColor = BODY_COLOR;
} else {
	FOOTER_OVERLAY.style.backgroundColor = "white";
}

var BODY_RECT = document.querySelector("body").getBoundingClientRect();
var spaceFromBottom =
	window.innerHeight -
	BODY_RECT.bottom -
	FOOTER_OVERLAY_DIVIDER.getBoundingClientRect().height;

var BODY_OFFSET = () => {
	console.log("FOOTER");
	BODY_RECT = document.querySelector("body").getBoundingClientRect();
	spaceFromBottom = window.innerHeight - BODY_RECT.bottom - 38;

	if (window.innerWidth < 980) {
		spaceFromBottom += 39;
	}

	if (spaceFromBottom > 1) {
		FOOTER_OVERLAY.style.top = "-" + Math.round(spaceFromBottom) + "px";
	} else {
		FOOTER_OVERLAY.style.top = "0px";
	}
};
BODY_OFFSET();
window.addEventListener("scroll", () => BODY_OFFSET());
window.addEventListener("resize", () => BODY_OFFSET());

//-----ALIGN SVG POSITION
var ALIGN_SVG = () => {
	let FOOTER_OVERLAY_HEIGHT = document
		.querySelector(".dw__global_footer_overlay")
		.getBoundingClientRect().height;
	let FOOTER_DIVIDER_HEIGHT =
		FOOTER_OVERLAY_DIVIDER.getBoundingClientRect().height - 20;
	FOOTER_OVERLAY_DIVIDER.style.transform =
		"translateY(" + FOOTER_OVERLAY_HEIGHT + "px)";
};
ALIGN_SVG();
window.addEventListener("resize", () => ALIGN_SVG());
