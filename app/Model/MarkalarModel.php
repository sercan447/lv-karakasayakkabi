<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MarkalarModel extends Model
{
    protected $table = "alf_markalar";
    protected $fillable =["amarka_id","marka_adi","marka_aciklama","mresim_id"];
    public $timestamps = true;
}
