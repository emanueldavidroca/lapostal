let menu = document.querySelector(".header-menu");
let cerrar = document.querySelector(".header-menu .cerrar");
let tres_barra = document.querySelector("#tres_barra");

tres_barra.addEventListener("click",()=>{
    if (!menu.classList.contains("activo")) {
        menu.classList.add("activo")
    } 
});

cerrar.addEventListener("click",()=>{
    if (menu.classList.contains("activo")) {
        menu.classList.remove("activo")
    } 
});

window.addEventListener("scroll", function() {
    if(window.pageYOffset > document.querySelector("header").offsetHeight){
        document.querySelector("header").classList.add("fixed");
    }else{
        document.querySelector("header").classList.remove("fixed");
    }

},false)