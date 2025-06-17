const HEADER = document.querySelector(".dw__navbar");

HEADER.addEventListener("click", () => {});

const openLightBox = (containerClassName) => {
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

var ScrollOffset = 0;
var InputVisible = true;
var ClosedInputfield = false;

document.addEventListener("scroll", (windowInfo) => {
  let ScrollOffset = window.scrollY;
  console.log(ScrollOffset);

  // hide input field by scrolling down in window
  let disapearThreshold = 60;
  if (ScrollOffset > disapearThreshold && InputVisible) {
    disapearInputField();
  }
  if (
    ScrollOffset + 5 < disapearThreshold &&
    !InputVisible &&
    !ClosedInputfield
  ) {
    revealInputField();
  }
});

const disapearInputField = (definitiveCloseInput = false) => {
  document
    .querySelector(".dw__chatbot_input_wrapper")
    .classList.add("dw__chatbot_input_wrapper_closed");
  setTimeout(() => {
    document
      .querySelector(".dw__navbar_chatbot_trigger")
      .classList.remove("dw__navbar_chatbot_trigger_closed");
  }, 100);
  InputVisible = false;
  if (definitiveCloseInput) {
    ClosedInputfield = true;
  }
};

const revealInputField = () => {
  document
    .querySelector(".dw__chatbot_input_wrapper")
    .classList.remove("dw__chatbot_input_wrapper_closed");
  setTimeout(() => {
    document
      .querySelector(".dw__navbar_chatbot_trigger")
      .classList.add("dw__navbar_chatbot_trigger_closed");
  }, 100);
  InputVisible = true;
};

const inputField = document.querySelector(".dw__chatbot_input_field");

if (inputField) {
  inputField.addEventListener("click", () => {
    openLightBox(".dw__chatbot_lightbox_container");
    setTimeout(() => {
      let iframe = document.querySelector("iframe");
      let iframeDoc = iframe.contentDocument || iframe.contentWindow.document;
      iframeDoc.querySelector(".chat-panel");
    }, 200);

    //document.getElementById("chat-panel").focus();
  });

  // Add the event listener to handle enter press
  inputField.addEventListener("keydown", (e) => {
    // Check for Enter key press
    console.log(inputField);
    if (e.key === "Enter" || e.key === "\n") {
      console.log(inputField.value);
      openLightBox(".dw__chatbot_lightbox_container");
      // Logic execution code goes here
    }
  });
}
