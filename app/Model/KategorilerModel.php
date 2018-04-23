<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class KategorilerModel extends Model
{
    protected $table = "alf_kategoriler";
    protected $fillable = ["akategori_id","kategori_adi","kategori_aciklama","kurun_kodu","kresim_id"];
    public $timestamps = true;
}
