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

/* CHATBOX Functions */
const openChatBotLightBox = () => {
	//console.log("open Lightbox");
	const LIGHTBOXCONTAINER = document.querySelector(
		".dw__chatbot_lightbox_container"
	);
	LIGHTBOXCONTAINER.classList.add("dw__active_lightbox");
	LIGHTBOXCONTAINER.addEventListener("click", () => {
		closeChatBotLightBox();
	});
	LIGHTBOXCONTAINER.firstChild.addEventListener("click", (event) => {
		event.stopPropagation();
	});
};

const closeChatBotLightBox = () => {
	const LIGHTBOXCONTAINER = document.querySelector(
		".dw__chatbot_lightbox_container"
	);
	LIGHTBOXCONTAINER.classList.remove("dw__active_lightbox");
};

/* DONATION Functions */
const openDonationLightBox = () => {
	//console.log("open Lightbox");
	const LIGHTBOXCONTAINER = document.querySelector(
		".dw__donation_lightbox_container"
	);
	LIGHTBOXCONTAINER.classList.add("dw__active_lightbox");
	LIGHTBOXCONTAINER.addEventListener("click", () => {
		closeDonationLightBox();
	});
	document
		.querySelector(".dw__donation_lightbox")
		.addEventListener("click", (event) => {
			event.stopPropagation();
		});
};

const closeDonationLightBox = () => {
	const LIGHTBOXCONTAINER = document.querySelector(
		".dw__donation_lightbox_container"
	);
	LIGHTBOXCONTAINER.classList.remove("dw__active_lightbox");
};
