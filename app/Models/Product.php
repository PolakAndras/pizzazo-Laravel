<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $appends = ['formatted_price'];

    function category(){
        return $this->belongsTo(Category::class);
    }

    //formatted_price    -> ez egy virtuális mezőt fog legenerálni, ami a formatted_price lesz. 
    //A get és az attribute közötti megnevezésből formázza ezt meg, és azért virtuális, mert nem jelenik meg az adatbázisban de attól olyan mintha lenne egy ilyen plusz mező a products táblában!
    function getFormattedPriceAttribute(){
       // return number_format($this->attributes["price"], 0, "", " " ) . " Ft"; -> a helper átalakítása előtt 
       return formattedPrice($this->attributes["price"]);
    }

}
