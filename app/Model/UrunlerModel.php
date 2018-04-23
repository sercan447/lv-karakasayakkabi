<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UrunlerModel extends Model
{
     
    protected $table = "alf_urunler";
    protected $fillable = [ "aurun_id",
                            "urun_ismi",
                            "urun_kodu",
                            "aciklama",
                            "ek_bilgi",
                            "alis_fiyat",
                            "satis_fiyat",
                            "kategori_id",
                            "marka_id",
                            "vitrin_resimid",
                            "tiklanma",
                            "stokvarmi"];
    public $timestamps = false;
}
