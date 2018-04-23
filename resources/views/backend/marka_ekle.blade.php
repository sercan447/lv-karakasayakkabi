@extends("backend/b_layouts/b_layouts")

@section("css_dosyalari")

@endsection

@section("script_dosyalari")
<script>
$(document).ready(function(){
     
  $('form').validate();
   $('form').ajaxForm({
       beforeSubmit:function(){
           swal({
               title : "<i class='fa fa-spinner fa-pulse fa-3x fa-fw'></i><span class='sr-only'>Kaydediliyor..</span>",
               text : "Veriler Kaydediliyor..",
               showConfirmButton:false
           });
       },
       success:function(response){
                   swal(response.baslik,response.icerik,response.durum);
       }
   });//ajaxforum end
   
});
</script>
 
@endsection

@section("icerik_bilgileri")


<h2>Marka Ekle</h2>

<form id="form" name="form" action="{{ URL('/admin/markaekle') }}" method="post" enctype="multipart/form-data" >
        
        {{ csrf_field() }}
    <input type="hidden" name="guncellenen_id" id="guncellenen_id" value="{{$marka->amarka_id}}" />
    <input type="hidden" name="resim_id" id="resim_id" value="{{$marka->mresim_id}}" />
    <div class="page-body">

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Marka Adı </label>
            <div class="col-sm-10">
                <input type="text" name="adi" id="adi" value="{{$marka->marka_adi}}" class="form-control" required placeholder="Marka Adı Giriniz">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Açıklama</label>
            <div class="col-sm-10">
                <textarea rows="5" cols="5" name="aciklama" id="aciklama"  class="form-control" placeholder="Marka Açıklaması">
                {{$marka->marka_aciklama}}
                </textarea>
            </div>
        </div>

        @if($marka->mresim_id != 0)
    @php
    $resim = DB::table("alf_resimler")->where("aresim_id",$marka->mresim_id)->first();
    @endphp
        <img  src="{{asset($resim->yol)}}" width="350px" height="350px"  />
        <input type="button" id="btnmarkaresim" 
                                        data-resimid="{{$resim->aresim_id}}" 
                                        data-resimadi="{{$resim->yol}}"
                                        data-durum="markaresim"
                                        value="sil" class="btnmarkaresim btn btn-danger" /> 
     @else
     <img src="{{asset('resim-yok.png')}}" width="250px" height="150px"/> 
     @endif 
        <div class="card">
            <div class="card-header">
                <h5>Resim Seç</h5>
            </div>
            <div class="card-block">
                <div class="sub-title">Markayı dair logo vb. resim türlerinden birini seçiniz.</div>
                <input type="file" name="marka_resmi" id="marka_resmi" >
            </div>
        </div>
        <div class="form-group row">

            <div class="col-sm-10">
                <input type="submit"  name="btn_kaydet" id="btn_kaydet" class="btn btn-success" value="Kaydet"></input>
                <input type="reset" class="btn btn-warning" value="Temizle"></input>
            </div>
        </div>


    </div>
</form>

@endsection