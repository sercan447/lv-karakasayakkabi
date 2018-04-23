<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SosyalMedyaModel extends Model
{
    protected $table = "alf_sosyalmedya";
    protected $fillable = ["numara","facebook","instagram","twitter","pinterest","googleplus","linkedin"];
    public $timestamps = true;
}
