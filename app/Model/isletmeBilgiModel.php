<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class isletmeBilgiModel extends Model
{
    protected $table = "alf_isletmebilgileri";
    protected $fillable = ["numara","adi","adres","aciklama","eposta1","eposta2","telefon1","telefon2","resimid"];
    public  $timestamps = true;


}
