<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ResimlerModel extends Model
{
    protected $table = "alf_resimler";
    protected $fillable =["aresim_id","yol","urun_id"];
    public  $timestamps = false;
}
