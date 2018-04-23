<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\MarkalarModel;

class RestMarka extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{ 
            $markalar =  MarkalarModel::All();     
              echo $markalar->toJson();
          }catch(\Exception $et)
          {   
              echo "MARKALAR GELIRKEN HATA OLUSTU";
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
            $markalar =  MarkalarModel::where("amarka_id",$id)->get();    
              echo $markalar->toJson();
          }catch(\Exception $et)
          {   
              echo "MARKA SHOW GELIRKEN HATA OLUSTU";
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
            $markalar =  MarkalarModel::where("amarka_id",$id)->get();  
              echo $markalar->toJson();
          }catch(\Exception $et)
          {   
              echo "MARKA EDIT GELIRKEN HATA OLUSTU";
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
            MarkalarModel::where("amarka_id",$id)->update(["marka_adi"=>"",
                                                          "marka_aciklama"=>"",
                                                           "mresim_id"=>0]);         
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
            $markalar =  MarkalarModel::where("amarka_id",$id)->delete();  
          }catch(\Exception $et)
          {   
              echo "MARKA SILINIRKEN GELIRKEN HATA OLUSTU";
          }finally{
  
          }
    }
}
