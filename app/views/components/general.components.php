<?php 
    class Components {
        
        //va fi apelata pentru runda activa
        static function active_round_view($type, $time){
            echo '
                    <h2 class="title-grey">Ce notă crezi că vei obține?</h2>
                    <hr class="sep">';

                    
                        if(isset($_SESSION["submitGrade"])) {
                            if ($_SESSION["submitGrade"]){
                                echo '<p class="text-grey">Alegerea ta a fost inregistrata! May the force be with you!</p>';
                                unset($_SESSION["submitGrade"]);
                            } else {                               
                                echo '<p class="text-grey">Nu uita! Ai voie să ghicești o singură dată.</p>';
                                unset($_SESSION["submitGrade"]);
                            }
                        }
             echo       
                    '<div class="grades">
                        <label class="container">1
                            <input type="radio" checked="checked" name="radio" value=1>
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">2
                            <input type="radio" name="radio" value=2>
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">3
                            <input type="radio" name="radio" value=3>
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">4
                            <input type="radio" name="radio" value=4>
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">5
                            <input type="radio" checked="checked" name="radio" value=5>
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">6
                            <input type="radio" name="radio" value=6>
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">7
                            <input type="radio" name="radio" value=7>
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">8
                            <input type="radio" name="radio" value=8>
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">9
                            <input type="radio" name="radio" value=9>
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">10
                            <input type="radio" name="radio" value=10>
                            <span class="checkmark"></span>
                        </label>
                    </div>

                    <input type="submit" value="Submit" class="pick-grade" name="submit_grade_'. $type .'">
                    <h2 class="title-grey">Cât mai trebuie să aștepți până la rezultate:</h2>
                    <hr class="sep">
                    <p id="demo" class="counter"></p>

                    <script>
                    var countDownDate = new Date(" '. $time . ' 12:00:00").getTime();

                    var countdownfunction = setInterval(function() {
                        
                        var now = new Date().getTime();
                        
                        var distance = countDownDate - now;
                        
                        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                        
                        document.getElementById("demo").innerHTML = days + "d " + hours + "h "
                        + minutes + "m " + seconds + "s ";
                        
                        if (distance < 0) {
                            clearInterval(countdownfunction);
                            document.getElementById("demo").innerHTML = "EXPIRED";
                        }
                    }, 1000);
                    </script>

                    ';
        }

        //va fi apelata pentru runda inactiva
        static function inactive_round_view($filePath){
            return '
                <h2 class="title-grey">Vezi ultimele rezultate:
                    <a href="'. $filePath .'">aici</a>
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