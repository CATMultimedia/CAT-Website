function showMenu(){menu.className="menu show"}function hideMenu(){menu.className="menu"}function showQL(){var e=document.querySelector("ul.quicklinks");"quicklinks"===e.className?(e.className="quicklinks expand",document.querySelector("#quicklink").style.color="rgba(255, 255, 255, 0.7)"):(e.className="quicklinks",document.querySelector("#quicklink").style.color="white")}var showButton=document.querySelector("#hamburgerButton");showButton.addEventListener("click",showMenu);var hideButton=document.querySelector("#closeButton");hideButton.addEventListener("click",hideMenu);var menu=document.querySelector("nav.menu"),quicklinkBtn=document.getElementById("quicklink");quicklinkBtn.addEventListener("click",showQL);
//# sourceMappingURL=./script-min.js.map