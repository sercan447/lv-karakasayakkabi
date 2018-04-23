<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FavoriModel extends Model
{
    protected $table = "krk_favori";
    protected $fillable =["favori_id","kullanici_id","urun_id"];
    public  $timestamps = true;
}
