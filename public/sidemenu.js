let isMenuOpen = false;

function toggleNav() {

    if (isMenuOpen == false) {
        document.getElementById("navMenu").style.width = "320px";
        
        isMenuOpen = true;
		
    } else {
        document.getElementById("navMenu").style.width = "0";
		
		isMenuOpen = false;
    }
}