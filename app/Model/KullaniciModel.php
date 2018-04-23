<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class KullaniciModel extends Model
{
    protected $table = "alf_kullanicilar";
    protected $fillable =["kullanici_id",
                            "adiniz",
                            "soyadiniz",
                            "eposta",
                            "telefon",
                            "isadresi",
                            "sehir",
                            "postakodu",
                            "ulke",
                            "bulten_istegi",
                            "adres",
                            "dogum_tarihi",
                            "parola"];
    public $timestamps = true;
}

