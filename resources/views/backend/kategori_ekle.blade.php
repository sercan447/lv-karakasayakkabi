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

/*
    $("#btn_kaydet").click(function(){
    
    var adi = $("#adi").val();
    var aciklama = $("#aciklama").val();
    var katkodu = $("#katkodu").val();
    var resim_id= $("#resim_id").val();
    var guncellenen_id = $("#guncellenen_id").val();

     var form_data = new FormData();
        form_data.append('adi',adi);
        form_data.append("aciklama",aciklama);
        form_data.append("katkodu",katkodu);
        form_data.append("resim_id",resim_id);
        form_data.append("guncellenen_id",guncellenen_id);
        form_data.append('_token', '{{csrf_token()}}');
        $.ajax({
            url: "{{route('kategoriekle')}}",
            data: form_data,
            type: 'POST',
            contentType: false,
            processData: false,
            success: function (data) {
               
                var myStack = {"dir1":"down", "dir2":"right", "push":"top","modal":true};
                    new PNotify({
                    title: "Bildirim",
                    text: "Kategori Bilgileri Başarılı bir şekilde Kaydedildi.",
                    addclass: "stack-custom",
                    stack: myStack,
                    type : 'success'
                    })                   
            },
            error: function (xhr, status, error) {
                
                var myStack = {"dir1":"down", "dir2":"right", "push":"top","modal":true};
                    new PNotify({
                    title: "Bildirim",
                    text: "Bilgiler kaydedilirken hata oluştu.lütfen baştan deneyiniz.",
                    addclass: "stack-custom",
                    stack: myStack,
                    type : 'error'
                    })   
            }
        });//AJAX
        
    });//BTN CLICK

    $("#kategori_resmi").change(function(){     
        var cevap = confirm("Kategori Resmini Kaydetmek istiyormusunuz ?");
            if(cevap){
                  upload(this);
            }
            else{
                alert("Kayıt İşlemi İptal");       
            }
    });//CHANGE

 

function upload(img) {
        var form_data = new FormData();
        form_data.append('kategori_resmi', img.files[0]);
        form_data.append('_token', '{{csrf_token()}}');
        $.ajax({
            url: "{{route('kategoriresimekle')}}",
            data: form_data,
            type: 'POST',
            contentType: false,
            processData: false,
            success: function (data) {
                var myStack = {"dir1":"down", "dir2":"right", "push":"top","modal":true};
                    new PNotify({
                    title: "Bildirim",
                    text: "Kategori Resmi Başarılı bir şekilde Kaydedildi.",
                    addclass: "stack-custom",
                    stack: myStack,
                    type : 'success'
                    })                       
            },
            error: function (xhr, status, error) {
                var myStack = {"dir1":"down", "dir2":"right", "push":"top","modal":true};
                    new PNotify({
                    title: "Bildirim",
                    text: "Kaydetme işlemi Yaparken bilinmeyen bir hata oluştu.lütfen baştan deneyiniz.",
                    addclass: "stack-custom",
                    stack: myStack,
                    type : 'error'
                    }) 
               
            }
        });//AJAX
    }//UPLOAD FONKSIYON
    */

    /*
$(".btnkategoriresim").click(function(){

var id = $(this).data("resimid");
var resimadi = $(this).data("resimadi");
var kategoriid = $("#guncellenen_id").val();
var durum = $(this).data("durum");

$.ajax({
        type:'GET',
        url:'{{ route("resim-sil") }}',
        data:{"id":id,"adi":resimadi,
              "gid":kategoriid,"durum":durum},
        headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()},
        success:function(basa){
                    alert(basa);
                    //sildikten sonra YONLENDIRME
            $(window).attr('location', '{{route("kategoriekle")}}/'+kategoriid);

        },
        error:function(hata){
                alert("KATEGORI RESMI SILME HATASI");
        }
    });//AJAX SONU

});//btnnresim SIL SONU
            */
        });//SAYFA HAZIRLANDI..
        

    </script>
@endsection

@section("icerik_bilgileri")
<h2>Kategori Ekle</h2>


<H3>{{date("Y-m-d H:i:s")}}</H3>
<form id="form" name="form" action="{{ URL('/admin/kategoriekle') }}" method="post" enctype="multipart/form-data">
        
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="guncellenen_id" id="guncellenen_id" value="{{$kategori->akategori_id}}" />
        <input type="hidden" name="resim_id" id="resim_id" value="{{$kategori->kresim_id}}" />
    <div class="page-body">

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Kategori Adı </label>
            <div class="col-sm-10">
                <input type="text" name="adi" id="adi" class="form-control" value="{{$kategori->kategori_adi}}" required placeholder="Kategori Adı Giriniz">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Kategori Kodu </label>
            <div class="col-sm-10">
                <input type="text" name="katkodu" id="katkodu" class="form-control" value="{{$kategori->kurun_kodu}}" required placeholder="(KHV-SLM-)vb. kod ismi giriniz">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Açıklama</label>
            <div class="col-sm-10">
                <textarea rows="5" cols="5" name="aciklama" id="aciklama" required  class="form-control" placeholder="Kategori Açıklaması">
                {{$kategori->kategori_aciklama}}
                </textarea>
            </div>
        </div>
    @if($kategori->kresim_id != 0)
    @php
    $resim = DB::table("alf_resimler")->where("aresim_id",$kategori->kresim_id)->first();
    @endphp
        <img  src="{{asset($resim->yol)}}" width="350px" height="350px" />
        <input type="button" id="btnkategoriresim" 
                                        data-resimid="{{$resim->aresim_id}}" 
                                        data-resimadi="{{$resim->yol}}"
                                        data-durum="kategoriresim"
                                        value="sil" class="btnkategoriresim btn btn-danger" /> 

     @else
     <img src="{{asset('resim-yok.png')}}" width="250px" height="150px"/> 
     @endif  
        <div class="card">
            <div class="card-header">
                <h5>Resim Seç</h5>
            </div>
            <div class="card-block">
                <div class="sub-title">Kategori logo,küçük resim vb. resim türlerinden birini seçiniz.</div>
                <input type="file" name="kategori_resmi" id="kategori_resmi" >
            </div>
        </div>
        <div class="form-group row">

            <div class="col-sm-10">
                <input type="submit" id="btn_kaydet" class="btn btn-success" value="Kaydet"></input>
                <input type="reset" class="btn btn-warning" value="Temizle"></input>
            </div>
        </div>


    </div>
</form>

@endsection