<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero=$_POST["checkbox"];
        $count = count($numero);
        /*echo $count;*/
        for ($i = 0; $i < $count; $i++) {
            echo $numero[$i];
        }
}
