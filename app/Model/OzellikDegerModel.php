<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OzellikDegerModel extends Model
{
    protected $table = "alf_ozellikdeger";
    protected $fillable = ["id","adi","aciklama","ozellik_tip"];
    public $timestamps = false;

    
}
