//MOBILE FUNCTIONS

var showButton = document.querySelector("#hamburgerButton");
showButton.addEventListener("click", showMenu);

var hideButton = document.querySelector("#closeButton");
hideButton.addEventListener("click", hideMenu);

var menu = document.querySelector("nav.menu");


function showMenu(){
    menu.className = "menu show";
    document.body.classList.toggle("no-scroll");
	// document.body.addEventListener("transitionend", afterTransition, true);//firefox
	// document.body.addEventListener("webkitTransitionEnd", afterTransition, true);//chrome
	function afterTransition(){
        document.body.classList.toggle("disable");
	}
}

function hideMenu(){
    document.body.classList.toggle("no-scroll");
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

$('ul li a').click(function() {
    $('.innerMenu li.current').removeClass('accordion');
    $(this).closest('li').addClass('accordion');
});