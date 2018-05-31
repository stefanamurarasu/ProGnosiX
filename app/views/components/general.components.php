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
        static function choose_grade_lab(){
            return '
                <div id="lab" class="course-content">
                <h1 class="to-align">Tehnologii WEB</h1>
                <h2 class="title-grey">Ce notă crezi că vei obține?</h2>
                <hr class="sep">
                <p class="text-grey">Nu uita! Ai voie să ghicești o singură dată.</p>
                <div class="grades">
                    <label class="container">1
                        <input type="radio" checked="checked" name="radio">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container">2
                        <input type="radio" name="radio">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container">3
                        <input type="radio" name="radio">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container">4
                        <input type="radio" name="radio">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container">5
                        <input type="radio" checked="checked" name="radio">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container">6
                        <input type="radio" name="radio">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container">7
                        <input type="radio" name="radio">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container">8
                        <input type="radio" name="radio">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container">9
                        <input type="radio" name="radio">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container">10
                        <input type="radio" name="radio">
                        <span class="checkmark"></span>
                    </label>
                </div>

                <button type="submit" class="pick-grade">Submit</button>
                <h2 class="title-grey">Cât mai trebuie să aștepți până la rezultate:</h2>
                <hr class="sep">
                <p id="demo" class="counter"></p>
                <!-- / Alege nota laborator-->
            </div>
            
            ';
        }
    }
?>