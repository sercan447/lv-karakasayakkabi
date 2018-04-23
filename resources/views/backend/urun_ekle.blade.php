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

    <script type="text/javascript">

        $(document).ready(function(){

          // $("#btn_kaydet").click(function(){

           /* var sayac =0;
            $("input[data-b='veri']").each(function(){
                 if($.trim($(this).val()) == "")
                    {  
                        $(this).removeClass().addClass("form-control form-control-danger");
                      
                    }else{
                        ++sayac;
                        $(this).removeClass().addClass("form-control form-control-success");     
                    }        
              });//EACH    

              var urunismi_tr = $.trim($("#adi_tr").val());
              var urunismi_eng = $.trim($("#adi_eng").val()); 
              var urunismi_fars = $.trim($("#adi_arp").val()); 
              var urunismi_arap = $.trim($("#adi_mala").val()); 
              var urunismi_malaz = $.trim($("#adi_fars").val());  

                if(sayac == 5)
                {   
                    var res = $("#urun_vitrin_resmi").val();
                    $.ajax({
                        type:'POST',
                        url:'{{ route("urunekle") }}',
                        data:{"resim":"res"},
                        headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()},
                        success:function(basa){
                                    alert(basa);
                        },
                        error:function(hata){
                                alert("hata");
                        }
                    });
                }//if
     
           }); //CLICK BUTON 
*/
/*
            $(".btnvitrinresims").click(function(){

                var resimid = $(this).data("resimid");
                var resimadi = $(this).data("resimadi");
                var urunid = $("#guncellenecek_urunid").val();
                var durum = $(this).data("durum");
                
                
               $.ajax({
                        type:'GET',
                        url:'{{ route("resim-sil") }}',
                        data:{"id":resimid,"adi":resimadi,
                              "gid":urunid,"durum":durum},
                        headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()},
                        success:function(basa){
                                    alert(basa);
                        },
                        error:function(hata){
                                alert("hata");
                        }
                    });//AJAX SONU
                    

            });//btnvitrinresims
            */
               
         });//SAYFA CALISTI

    </script>
@endsection

@section("icerik_bilgileri")


<h2>{{ $tip }}</h2>

<form id="formUrun" name="formUrun" action="{{ route('urunekle') }}" method="post" enctype="multipart/form-data">
         {{ csrf_field() }}
         <input type="hidden" name="_token" value="{{ csrf_token() }}">
         <input type="hidden" name="durum" value="{{ $durum }}">
         <input type="hidden" name="guncellenecek_urunid" id="guncellenecek_urunid" value="{{ $guncellenecek_urunid }}">
    <div class="page-body">

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Ürün Adı </label>
            <div class="col-sm-10">
                <input type="text" name="adi_tr" id="adi_tr" required data-b="veri" value="{{$urun->urun_ismi}}" class="form-control form-control-warning" placeholder="Türkçe Ürün Adı Giriniz">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Ürün Adı <font color="reg">(Eng)</font> </label>
            <div class="col-sm-10">
                <input type="text" name="adi_eng" id="adi_eng" data-b="veri" class="form-control form-control-success" placeholder="İngilizce Ürün Adı Giriniz">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Ürün Adı <font color="reg">(Arapça)</font> </label>
            <div class="col-sm-10">
                <input type="text" name="adi_arp" id="adi_arp" data-b="veri" class="form-control form-control-success" placeholder="Arapça Ürün Adı Giriniz">
            </div>
        </div>
        
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Açıklama</label>
            <div class="col-sm-10">
                <textarea rows="5" cols="5" name="aciklama" id="aciklama" class="form-control form-control-warning" placeholder="Ürün Açıklaması">
                {{trim($urun->aciklama)}}
                </textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Ek Bilgi</label>
            <div class="col-sm-10">
                <textarea rows="5" cols="5" name="ekbilgi" id="ekbilgi" class="form-control form-control-success" placeholder="ekbilgi">
                    {{trim($urun->ek_bilgi)}}
                </textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Alış Fiyat</label>
            <div class="col-sm-10">
                <input type="number" name="alisfiyat" id="alisfiyat" value="{{$urun->alis_fiyat}}" class="form-control" placeholder="Alış Fiyatını Giriniz">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Satış Fiyat </label>
            <div class="col-sm-10">
                <input type="number" name="satisfiyat" id="satisFiyat" value="{{$urun->satis_fiyat}}" class="form-control" placeholder="Satış Fiyatını giriniz">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Kategori Seç</label>
            <div class="col-sm-10">
                <select name="kategorid" id="kategorid"  class="form-control form-control-warning">
                    <option value="optselectkategori">Kategori Markası Seçiniz </option>
                    @if($kategoriler != null)
                        @foreach($kategoriler as $kat)
                            @php $selected = $kat->akategori_id == $urun->kategori_id ? 'selected' : '';  @endphp
                        <option value="{{ $kat->akategori_id }}" {{ $selected }}> {{$kat->kategori_adi }} </option>
                        @endforeach
                    @else
                    <option value="#"> Lütfen Kategori Ekleyiniz </option>
                    @endif
                  </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Marka Seç </label>
            <div class="col-sm-10">
            <select name="markaid" id="markaid" required class="form-control form-control-warning">
                    <option value="optselectmarka">Ürün Markası Seçiniz</option>
                    @if($markalar != null)
                        @foreach($markalar as $mar)
                        @php $selected = $mar->amarka_id == $urun->marka_id ? 'selected' : '';  @endphp
                        <option value="{{ $mar->amarka_id }}" {{ $selected }}> {{$mar->marka_adi }} </option>
                        @endforeach
                    @else
                    <option value="#"> Lütfen Marka Ekleyiniz </option>
                    @endif
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Stok Durumu </label>
            <div class="col-sm-10">
            <select name="stok_varmi" id="stok_varmi"  class="form-control form-control-danger">
                    <option value="opt1">Stok Durumu Seçiniz</option>
                 
                     @if($urun->stokvarmi == 1)
                            <option value="1" selected>Stokta Var</option>
                            <option value="0">Stokta Yok</option>
                            <option value="2">Stokta Sınırlı</option>
                     @elseif($urun->stokvarmi == 0)      
                            <option value="1">Stokta Var</option>
                            <option value="0" selected>Stokta Yok</option>
                            <option value="2">Stokta Sınırlı</option>
                    @elseif($urun->stokvarmi == 2)
                            <option value="1">Stokta Var</option>
                            <option value="0">Stokta Yok</option>
                            <option value="2" selected>Stokta Sınırlı</option>
                     @endif
                           
                </select>
            </div>
        </div>
         @php
            $resimler = null;
            if($durum == "guncelle")
            {
             $resimler = DB::table("alf_resimler")->where("aresim_id",$urun->vitrin_resimid)->first(); 
            }else{

            }   
          @endphp
         @if($resimler != null)
        <img src="{{asset('UrunResimler/uresim')}}/{{$resimler->yol}}" width="250px" height="250px"/> 
        <input type="button" id="btnvitrinresims" 
                                        data-resimid="{{$resimler->aresim_id}}" 
                                        data-resimadi="{{$resimler->yol}}"
                                        data-durum="vitrin"
                                        value="sil" class="btnvitrinresims btn btn-danger" />      
        @else
        <img src="{{asset('resim-yok.png')}}" width="250px" height="150px"/> 
        @endif
        <div class="card">
            <div class="card-header">
                <h5>Vitrin Resmi Seçiniz</h5>
            </div>
            <div class="card-block">
                <div class="sub-title">Ürüne dair Vitrin resmi Ürünü tanıtmak amaçlı vitrin de gösterilen resimdir.</div>
                <input type="file" name="urun_vitrin_resmi"  id="urun_vitrin_resmi"  data-resimadi="">
            </div> 
        </div>  
        @php
        $resimlers = null;
            if($durum == "guncelle")
            {
                $resimlers = DB::table("alf_resimler")->where("urun_id",$urun->aurun_id)->get();
            }else{

            }
          @endphp
        @if($resimlers != null)
         @foreach($resimlers as $res)
         <img src="{{asset('UrunResimler/uresim')}}/{{$res->yol}}" width="250px" height="250px"/>
         <input type="button" id="btnvitrinresims" 
                                 data-resimid="{{$res->aresim_id}}"
                                 data-resimadi="{{$res->yol}}"
                                 data-durum="urunresim"
                                                     value="sil"class="btnvitrinresims btn btn-danger" />  
         @endforeach
         @endif
        <div class="card">
            <div class="card-header">
                <h5>Ürün Resmi Seçiniz</h5>
            </div>
            <div class="card-block">
                <div class="sub-title">Ürüne dair Diger resimleri var ise ekleyiniz.</div>
                <input type="file" name="urun_resmi[]"  id="urun_resmi" multiple  data-resimadi="">
            </div>
        </div>
        <div class="form-group row">

            <div class="col-sm-10">
                <input type="submit" id="btnn_kaydet" class="btn btn-success" value="Kaydet"/>
                <input type="reset" class="btn btn-warning" value="Temizle" />
            </div>
        </div>
    </div>
</form>


@endsection