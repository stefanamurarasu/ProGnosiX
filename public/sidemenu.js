let isMenuOpen = false;

function toggleNav() {

    if (isMenuOpen == false) {
        document.getElementById("navMenu").style.width = "320px";
		document.body.style.backgroundColor = "rgba(0,0,0,1)";
        
        isMenuOpen = true;
		
    } else {
        document.getElementById("navMenu").style.width = "0";
		
		isMenuOpen = false;
    }
}