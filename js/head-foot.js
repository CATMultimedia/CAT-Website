//MOBILE FUNCTIONS

var showButton = document.querySelector("#hamburgerButton");
showButton.addEventListener("click", showMenu);

var hideButton = document.querySelector("#closeButton");
hideButton.addEventListener("click", hideMenu);

var menu = document.querySelector("nav.menu");


function showMenu(){
    menu.className = "menu show";
}

function hideMenu(){
    menu.className = "menu";
}

//DESKTOP FUNCTION
var quicklinkBtn = document.getElementById("quicklink");
quicklinkBtn.addEventListener("click", showQL);

function showQL() {
    var qll = document.querySelector("ul.quicklinks");
    
    if (qll.className === "quicklinks"){
        qll.className = "quicklinks expand"; document.querySelector("#quicklink").style.color = "rgba(255, 255, 255, 0.7)";
    }
    
    else {
        qll.className = "quicklinks"; document.querySelector("#quicklink").style.color = "white";
    }
}
