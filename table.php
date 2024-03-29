<?php
function table ( $type , $nombre){
      switch ($type) {
            case "addition": 
                 echo " <br><br> ------------------TABLE D'ADDITION---------- <br>";
               
                 for ($j=1; $j<=10;$j++  ){
              $valiny = $nombre + $j;
              echo $nombre . " et " . $j . " font " .   $valiny . "<br>" ;
              }
                break;
            case "soustraction":
                echo " <br><br> ------------------TABLE DE SOUSTRACTION---------- <br>";
                for ($val=1; $val<=10;$val++ ){
              $d = $nombre + $val;
              echo  $d . " de " .$nombre   . " reste " .  $val . "<br>" ;
              }
                break;
            case "multiplication":
                echo " <br><br>------------------TABLE DE MULTIPLICATION---------- <br>";
                 for ($j=1; $j<=10;$j++  ){
              $valiny = $nombre * $j;
              echo  $nombre . " fois " . $j . " font " .   $valiny . "<br>" ;
              }
                break;
            case "division":
                 echo " <br><br> ------------------TABLE DE DIVISION---------- <br>";
                for ($j=1; $j<=10;$j++  ){
                  $valiny = $nombre * $j;
                  echo  $nombre . " en " . $valiny . " est " .   $j . "<br>" ;
              }
              break;
        }
    }
table ( "addition" , 5);

