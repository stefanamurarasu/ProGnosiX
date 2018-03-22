let isMenuOpen = false;

function toggleNav() {
    "use strict";
    
	if(isMenuOpen === false) { 
		document.getElementById("navMenu").style.width = "250px";
		document.getElementById("header").style.marginLeft = "250px";
		document.getElementById("content").style.marginLeft = "250px";
		document.getElementById("footer").style.marginLeft = "250px";
		isMenuOpen = true;
	} else {
		document.getElementById("navMenu").style.width = "0";
		document.getElementById("header").style.marginLeft = "0";
		document.getElementById("content").style.marginLeft = "0";
		document.getElementById("footer").style.marginLeft = "0";
		isMenuOpen = false;
	}
}