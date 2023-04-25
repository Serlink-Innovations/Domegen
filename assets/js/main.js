//Mobile HeaderFixed function
function stickyMenu() {
  const navigation = document.querySelector(".navigation");
  const site = document.querySelector(".main__heeader");
  const home = document.querySelector(".home");

  navigation.classList.toggle("sticky", window.scrollY > 0);

  if (navigation.classList.contains("sticky")) {
  }
}

window.addEventListener("scroll", stickyMenu);

// Mobile Navigation
const navToggler = document.querySelector(".navToggler");
const navigationBar = document.querySelector(".navbar");
const maxMega = document.querySelector("#mega-menu-wrap-primary");
const navigationIcons = document.querySelector(".navigationIcons");

navToggler.addEventListener("click", mobileToggle);

function mobileToggle() {
  if (maxMega.classList.contains("active")) {
    maxMega.classList.remove("active");
  } else {
    maxMega.classList.add("active");
  }

  if (navigationIcons.classList.contains("active")) {
    navigationIcons.classList.remove("active");
  } else {
    navigationIcons.classList.add("active");
  }
}

// Search Hide and Unhide
const searchIcon = document.querySelector(".icon--header-search");
const searchBar = document.querySelector(".woocommerce-product-search");

searchIcon.addEventListener("click", showSearch);

function showSearch() {
  if (searchBar.classList.contains("showSearch")) {
    searchBar.classList.remove("showSearch");
  } else {
    searchBar.classList.add("showSearch");
  }

  window.onclick = function (event) {
    if (event.target == searchBar) {
      searchBar.classList.remove("showSearch") = "none";
    }
  };
}

// Registration Form Hide and Unhide
const loginForm = document.querySelector("#loginContainer");
const registerForm = document.querySelector("#registration");
const registerBtn = document.querySelector("#registerBtn");

registerBtn.addEventListener("click", showRegistration);

function showRegistration() {
  if ((registerForm.style.display = "none")) {
    registerForm.style.display = "flex";
    loginForm.style.display = "none";
  } else {
    registerForm.style.display = "none";
    loginForm.style.display = "flex";
  }

  window.onclick = function (event) {
    if (event.target == registerForm) {
      registerForm.style.display = "none";
      loginForm.style.display = "block";
    }
  };
}

//Slider
const activeSlide = document.querySelector(".active-slide");
const slides = document.querySelectorAll(".hero-carousel__item");
