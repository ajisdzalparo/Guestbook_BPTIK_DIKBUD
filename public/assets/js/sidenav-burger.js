// sidenav transition-burger

let sidenav = document.querySelector("aside");
let sidenav_trigger = document.querySelector("[sidenav-trigger]");
let sidenav_close_button = document.querySelector("[sidenav-close]");
let burger = sidenav_trigger.firstElementChild;
let top_bread = burger.firstElementChild;
let bottom_bread = burger.lastElementChild;

sidenav_trigger.addEventListener("click", function() {
    if (page == "Daftar Pengunjung") {
        sidenav.classList.toggle("xl:left-[18%]");
    }
    sidenav_close_button.classList.toggle("hidden");
    sidenav.classList.toggle("-translate-x-full");
    sidenav.classList.toggle("shadow-soft-lg");
    if (page == "Daftar Pengunjung") {
        top_bread.classList.toggle("-translate-x-[5px]");
        bottom_bread.classList.toggle("-translate-x-[px]");
    } else {
        top_bread.classList.toggle("translate-x-[5px]");
        bottom_bread.classList.toggle("translate-x-[5px]");
    }
});
sidenav_close_button.addEventListener("click", function() {
    sidenav_trigger.click();
});

window.addEventListener("click", function(e) {
    if (!sidenav.contains(e.target) && !sidenav_trigger.contains(e.target)) {
        if (sidenav.classList.contains("translate-x-0")) {
            sidenav_trigger.click();
        }
    }
});