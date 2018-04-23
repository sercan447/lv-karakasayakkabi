<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\KategorilerModel;

class RestKategori extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            
          $kategoriler =  KategorilerModel::All();
                
            echo $kategoriler->toJson();

        }catch(\Exception $et)
        {   
            echo "KATEGORILER GELIRKEN HATA OLUSTU";

        }finally{

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            
            $kategoriler =  KategorilerModel::where("akategori_id",$id)->get();
                  
              echo $kategoriler->toJson();
  
          }catch(\Exception $et)
          {   
              echo "KATEGORI SHOW GELIRKEN HATA OLUSTU";
  
          }finally{
  
          }
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
            
            $kategoriler =  KategorilerModel::where("akategori_id",$id)->get();
                  
              echo $kategoriler->toJson();
          }catch(\Exception $et)
          {   
              echo "KATEGORI EDIT GELIRKEN HATA OLUSTU";
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
            
             KategorilerModel::where("akategori_id",$id)->update(["kategori_adi"=>"",
                                                                  "kategori_aciklama"=>"",
                                                                  "kurun_kodu"=>"",
                                                                  "kresim_id"=>0]);
                  
          }catch(\Exception $et)
          {   
              echo "KATEGORI GUNCELLEME HATA OLUSTU";
  
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
            
            $kategoriler =  KategorilerModel::where("akategori_id",$id)->delete();
                    
          }catch(\Exception $et)
          {   
              echo "KATEGORI SILINIRKEN HATA OLUSTU";
  
          }finally{
  
          }
    }
}
