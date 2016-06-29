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
function showInnerMenu(itemID){
    var innerMenu = document.getElementById(itemID);
    var allInnerMenus = document.querySelectorAll(".innerMenu");
    for (var i=0; i < allInnerMenus.length; i++){
        if (allInnerMenus[i].className === "innerMenu showMe" && allInnerMenus[i].id !== itemID){
            allInnerMenus[i].className = "innerMenu";
            break;
        }
    }
    if (innerMenu.className === "innerMenu"){
        innerMenu.className = "innerMenu showMe";
    }
    
    else {
        innerMenu.className = "innerMenu";
    }
}

var quicklinkBtn = document.getElementById("quicklink");
quicklinkBtn.addEventListener("click", showQL);

function showQL() {
    var qll = document.querySelector("ul.quicklinks");
    
    if (qll.className === "quicklinks"){
        qll.className = "quicklinks expand";
    }
    
    else {
        qll.className = "quicklinks";
    }
}