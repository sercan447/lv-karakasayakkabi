<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SepetModel extends Model
{
    protected $table = "alf_sepet";
    protected $fillable =["sepet_id","kullanici_id","urun_id"];
    public $timestamps = true;
}

