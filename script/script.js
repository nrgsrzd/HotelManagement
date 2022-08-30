
window.addEventListener("load", function (){
    /* Page Loader */
 /*   document.querySelector(".page-loader").classList.add("fade-out");
    setTimeout(function (){
        document.querySelector(".page-loader").style.display="none";
    },600);*/
    /* animation on scroll */
    AOS.init();
});
/* toggle navbar */
const navToggler = document.querySelector(".nav-toggler");
navToggler.addEventListener("click", toggleNav);

function toggleNav(){
    navToggler.classList.toggle("active");
    document.querySelector(".nav").classList.toggle("open");
}

/*close nav when clicking on a nav item */
document.addEventListener("click", function (e){
    if(e.target.closest(".nav-item")){
        toggleNav();
    }
});

window.addEventListener("scroll", function (){
    if(this.pageYOffset>60){
        document.querySelector(".header").classList.add("sticky");
    }
    else{
        document.querySelector(".header").classList.remove("sticky");
    }
});