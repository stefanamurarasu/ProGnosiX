function choose_eval(evalType,elmnt,color) {
    var i, tabcontent, buttons;
    tabcontent = document.getElementsByClassName("course-content");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    buttons = document.getElementsByClassName("button-course");
    for (i = 0; i < buttons.length; i++) {
        buttons[i].style.backgroundColor = "";
    }
    document.getElementById(evalType).style.display = "block";
    elmnt.style.backgroundColor = color;

}
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();