var menu=document.getElementById("menu");
var enlaces=menu.getElementsByTagName("a");

var path= window.location.pathname;
var protocol=window.location.protocol;
var host=window.location.host;

for(var i=0; i<enlaces.length ; i++){
    console.log(enlaces[i].href);
    if(enlaces[i].href === protocol+"//"+host+path){
        enlaces[i].className = "active";
    }
}