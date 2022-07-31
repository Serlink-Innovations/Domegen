const nav = document.querySelectorAll('#nav')[0];
const navToggle = document.querySelectorAll('.navToggle')[0];

function mobileNav() {
    if (nav.classList.contains('active')) {
        nav.classList.remove('active')
    } else {
        nav.classList.add('active')
    }
}