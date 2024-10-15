console.log("-------> loaded nav script");

const HEADER = document.querySelector(".dw__navbar");

HEADER.addEventListener("click", () => {});

const openLightBox = (containerClassName) => {
	console.log("open Lightbox:  " + containerClassName);
	const LIGHTBOXCONTAINER = document.querySelector(containerClassName);
	LIGHTBOXCONTAINER.classList.add("dw__active_lightbox");
	LIGHTBOXCONTAINER.addEventListener("click", () => {
		closeLightBox(containerClassName);
	});
	if (LIGHTBOXCONTAINER.firstChild) {
		LIGHTBOXCONTAINER.firstChild.addEventListener("click", (event) => {
			event.stopPropagation();
		});
	}
};

const closeLightBox = (containerClassNameToClose) => {
	const LIGHTBOXCONTAINER = document.querySelector(containerClassNameToClose);
	LIGHTBOXCONTAINER.classList.remove("dw__active_lightbox");
};
