<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OnlineKullaniciModel extends Model
{
    protected $table = "onlinekullanicilar";
    protected $fillable =["id","user_id","last_activity"];
    public  $timestamps = false;
}
