<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\UrunlerModel;

class RestUrun extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $veriler = UrunlerModel::join("alf_markalar as marka","marka.amarka_id","=","alf_urunler.marka_id")->
                                 join("alf_resimler as resim","resim.aresim_id","=","alf_urunler.vitrin_resimid")
                                 ->orderBy("alf_urunler.aurun_id","DESC")->get();
        echo $veriler->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo "create";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $veriler = UrunlerModel::
          join("alf_markalar as marka","marka.amarka_id","=","alf_urunler.marka_id")
        ->join("alf_kategoriler as kategori","kategori.akategori_id","=","alf_urunler.kategori_id")
        ->join("alf_resimler as resim","resim.urun_id","=","alf_urunler.aurun_id")
        ->select("alf_urunler.*" ,"resim.yol","kategori.kategori_adi","marka.marka_adi")
        ->orderBy("alf_urunler.aurun_id","DESC")
        ->where("alf_urunler.aurun_id",$id)->get();

        echo $veriler->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
        $veriler = UrunlerModel::select("alf_urunler.*")
                                ->orderBy("alf_urunler.aurun_id","DESC")
                                 ->where("alf_urunler.aurun_id",$id)->get();
            
            echo $veriler->toJson();
        }catch(\Exception $et)
        {
                echo "URUN EDIT BOLUMUNE VERILERI CEKERKEN HATA OLUSTU";
        }finally{

        }
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
        //GUNCELLEME
        UrunlerModel::where("aurun_id",$id)->update(["urun_ismi"=>"",
                                                     "aciklama"=>"",
                                                     "ek_bilgi"=>"",
                                                     "alis_fiyat"=>0,
                                                     "satis_fiyat"=>0,
                                                     "kategori_id"=>0,
                                                     "marka_id"=>0,
                                                     "vitrin_resimid"=>0,
                                                     "stokvarmi"=>0]);
                                                     
        }catch(\Exception $et)
        {
            echo "GUNCELLEME HATASI";
        }finally{

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        try{
            UrunlerModel::where("aurun_id",$id)->delete();
        }catch(\Exception $et)
        {
            echo "SILERKEN HATA OLUSTU";
        }finally{

        }
    }
}
