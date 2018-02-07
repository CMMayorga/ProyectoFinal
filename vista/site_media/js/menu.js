
var btn_menu = document.getElementById("btn_menu");
var menu = document.getElementById("menu");
var mascara = document.getElementById("mascara");

function recalcMenu() {
    if (window.innerWidth >= 800) {
        mostrarMenu();
    }
}
;

btn_menu.onclick = mostrarMenu;

function mostrarMenu() {
    menu.style.left = "0";
    mascara.style.display = "block";
}
;

mascara.onclick = cerrarMenu;

function cerrarMenu() {
    menu.style.left = "-250px";
    mascara.style.display = "none";
}
;