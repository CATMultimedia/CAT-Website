//Accordion menu
var mainLinks = document.querySelectorAll('li.mainLink');
for (var x=0; x < mainLinks.length; x++){
    mainLinks[x].addEventListener('click', accordion);
}
function accordion(e) {
    var tElem = e.target;  
    if (tElem.className === "mainLink"){
        tElem.className += " accordion";
    }
    else if (tElem.className === "mainLink accordion") {
        tElem.className = "mainLink";
    }
    for (var x=0; x < mainLinks.length; x++){
        if (mainLinks[x] !== tElem){
            mainLinks[x].className = "mainLink";
        }
    }
}