<?php 
    class Components {
        static function createMenu(){
            return '
            <div id="navMenu" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="toggleNav()">&times;</a>
                <a href="./course.view.php">Tehnologii Web</a>
                <a href="./second_course.view.html">Practica SGBD</a>
                <a href="./third_course.view.html">Programare Avansată</a>
                <a href="./fourth_course.view.html">Ingineria Programării</a>
                <a href="./fifth_course.view.html">Criptografie</a>
                <a href="./sixth_course.view.html">Matlab</a>
            </div>
            ';
        }

        //va fi apelata pentru runda activa
        static function active_round_view(){
            return '
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
                    ';
        }

        //va fi apelata pentru runda inactiva
        static function inactive_round_view(){
            return '
                <h2 class="title-grey">Vezi ultimele rezultate:
                    <a href="https://docs.google.com/spreadsheets/d/e/2PACX-1vRMnYur2yUmHnkaCgx0zglwzm95TdfiUqolq-FmojbJKz3xruW89GLxu4w-CO8IQt5GJh2DkM7gY3JG/pubhtml">aici</a>
                </h2>
                <hr class="sep">
                <h2 class="title-grey padd-subtitle">Descarcă rezultatele în format PDF/CSV:</h2>
                <hr class="sep">
                <div class="dropdown">
                    <button class="dropbtn">Descarcă rezultate</button>
                    <div class="dropdown-content">
                        <a href="#">CSV</a>
                        <a href="#">PDF</a>
                    </div>
                </div>
            ';
        }
    }
?>