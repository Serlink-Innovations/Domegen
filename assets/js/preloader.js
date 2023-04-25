/***
 * Show/Hide Preloader Function
 **/
const preloader = document.querySelector("#preloader");
const body = document.getElementsByTagName("body")[0];
const html = document.getElementsByTagName("html")[0];

window.addEventListener("load", hide);

function hide() {
  preloader.classList.toggle("hide");
  body.style.overflowY = "auto";
  html.style.overflowY = "auto";
}
