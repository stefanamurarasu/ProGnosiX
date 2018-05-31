<?php 
    class Components {
        static function createMenu(){
            return '
            <div id="navMenu" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="toggleNav()">&times;</a>
                <a href="./first_course.view.php">Tehnologii Web</a>
                <a href="./second_course.view.html">Practica SGBD</a>
                <a href="./third_course.view.html">Programare Avansată</a>
                <a href="./fourth_course.view.html">Ingineria Programării</a>
                <a href="./fifth_course.view.html">Criptografie</a>
                <a href="./sixth_course.view.html">Matlab</a>
            </div>
            ';
        }
    }
?>