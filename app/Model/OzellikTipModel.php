<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OzellikTipModel extends Model
{
    
    protected $table = "alf_ozelliktip";
    protected $fillable = ["id","ozellik_adi","ozellik_aciklama","anakategori_id"];
    public $timestamps = false;

    
}
