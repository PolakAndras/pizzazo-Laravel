
<?php

function formattedPrice($price){
    // Ez a Prducts.php-bol jön, ezt alakítjuk át
   // return number_format($this->attributes["price"], 0, "", " " );
    return number_format($price, 0, "", " " ) . " Ft";
}
