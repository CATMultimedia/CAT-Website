//MOBILE FUNCTIONS
var menu = document.querySelector("nav.menu");

function showMenu(){
	//function afterTransition(){
    //    document.body.classList.toggle("disable");
	//}
    menu.className = "menu show";
    document.body.classList.toggle("no-scroll");
	//document.body.addEventListener("transitionend", afterTransition, true);//firefox
	//document.body.addEventListener("webkitTransitionEnd", afterTransition, true);//chrome

/*
		var blockMenuHeaderScroll;
		window.blockMenuHeaderScroll = false;
		$(window).on('touchstart', function(e)	{
		    if ($(e.target).closest('.no-scroll').length === 1) {
		        blockMenuHeaderScroll = true;
		    }
		});
		$(window).on('touchend', function() {
		    blockMenuHeaderScroll = false;
		});
		$(window).on('touchmove', function(e) {
		    if (blockMenuHeaderScroll) {
		        e.preventDefault();
		    }
		});
*/
}

function hideMenu(){
    document.body.classList.toggle("no-scroll");
    menu.className = "menu";
}

var showButton = document.querySelector("#hamburgerButton");
showButton.addEventListener("click", showMenu);

var hideButton = document.querySelector("#closeButton");
hideButton.addEventListener("click", hideMenu);


//DESKTOP FUNCTION
var quicklinkBtn = document.getElementById("quicklink");
function showQL() {
    var qll = document.querySelector("ul.quicklinks");

    if (qll.className === "quicklinks"){
        qll.className = "quicklinks expand"; document.querySelector("#quicklink").style.color = "rgba(255, 255, 255, 0.7)";
    }

    else {
        qll.className = "quicklinks"; document.querySelector("#quicklink").style.color = "white";
    }
}

quicklinkBtn.addEventListener("click", showQL);


