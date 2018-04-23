@extends("frontend.f_layout.f_layouts")

@section("script_files")

<script	src="{{ asset('js/jquery.form.min.js') }}" ></script>
<script src="{{ asset('js/jquery.validate.min.js') }}" ></script>
<script src="{{ asset('js/messages_tr.js') }}" ></script>
<script src="{{ asset('js/sweetalert2.all.min.js')}}" ></script>

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

@section("css_files")
<link href="{{ asset('css/sweetalert2.min.css')}}" />
@endsection

@section("icerik")

<div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <ul>
                            <li><a href="{{URL('/')}}">Anasayfa</a></li>
                            <li><a href="#">Üyelik Kayıt</a></li>
                           
                        </ul><!-- end breadcrumb -->
                    </div><!-- end col -->    
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end breadcrumbs -->
        
        <!-- start section -->
        <section class="section white-backgorund">
            <div class="container">
                <div class="row">
                  
                @include("frontend.bar2")
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-sm-12 text-left">
                                <h2 class="title">Kayıt Ol</h2>
                            </div><!-- end col -->
                        </div><!-- end row -->
                        
                        <hr class="spacer-5"><hr class="spacer-20 no-border">
                    <form id="form" name="form" action="{{route('uyekayit')}}" method="POST" >        
                        {{csrf_field()}}   
                        <input type="hidden" name="kisi_id" value="{{$kisi->kullanici_id}}" />
                    <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ad">Adı  <span class="text-danger">*</span></label>
                                    <input id="ad" type="text" placeholder="Adınızı giriniz" name="ad" class="form-control input-sm required" value="{{$kisi->adiniz}}">
                                </div><!-- end form-group -->
                                <div class="form-group">
                                    <label for="soyad"> Soyadı <span class="text-danger">*</span></label>
                                    <input id="soyad" type="text" placeholder="Soyadınızı giriniz" name="soyad" class="form-control input-sm required" value="{{$kisi->soyadiniz}}">
                                </div><!-- end form-group -->
                                <div class="form-group">
                                    <label for="telefon">Telefon <span class="text-danger"></span></label>
                                    <input id="telefon" type="text" placeholder="Telefon Numaranız (İsteğe Bağlı)" name="telefon" class="form-control input-sm required" value="{{$kisi->telefon}}">
                                </div><!-- end form-group -->
                                <div class="form-group">
                                    <label for="ulke">Ülke <span class="text-danger">*</span></label>
                                    <input id="ulke" type="text" placeholder="Ülke giriniz." name="ulke" class="form-control input-sm required" value="{{$kisi->ulke}}">
                                </div><!-- end form-group -->
                                <div class="form-group">
                                    <label for="sehir">Şehir <span class="text-danger">*</span></label>
                                    <input id="sehir" type="text" placeholder="Şehir giriniz" name="sehir" class="form-control input-sm required" value="{{$kisi->sehir}}">
                                </div><!-- end form-group -->
                                <div class="form-group">
                                    <label for="adres">Adres <span class="text-danger"></span></label>
                                    <input id="adres" type="text" placeholder="Adres giriniz (İsteğe Bağlı)" name="adres" class="form-control input-sm required" value="{{$kisi->adres}}">
                                </div><!-- end form-group -->
                                <div class="form-group">
                                    <label for="postakodu">Posta Kodu <span class="text-danger"></span></label>
                                    <input id="postakodu" type="text" placeholder="Posta Kodu Giriniz. (İsteğe Bağlı)" name="postakodu" class="form-control input-sm required" value="{{$kisi->postakodu}}">
                                </div><!-- end form-group -->
                        
                                <div class="form-group">
                                    <label for="eposta">E-Posta Adresiniz <span class="text-danger">*</span></label>
                                    <input id="eposta" type="email" placeholder="E-Posta Adresiniz" name="eposta" class="form-control input-sm required email" value="{{$kisi->eposta}}">
                                </div><!-- end form-group -->
                                <label>Doğum Tarihi</label>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <select class="form-control" name="gun">
                                                @for($i=1;$i<=31; $i++)
                                                   
                                                <option value="{{$i}}">{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div><!-- end form-group -->
                                    </div><!-- end col -->
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <select class="form-control" name="ay">
                                                <option value="1">Ocak</option>
                                                <option value="2">Şubat</option>
                                                <option value="3">Mart</option>
                                                <option value="4">Nisan</option>
                                                <option value="5">Mayıs</option>
                                                <option value="6">Haziran</option>
                                                <option value="7">Temmuz</option>
                                                <option value="8">Ağustos</option>
                                                <option value="9">Eylül</option>
                                                <option value="10">Ekim</option>
                                                <option value="11">Kasım</option>
                                                <option value="12">Aralık</option>
                                            </select>
                                        </div><!-- end form-group -->
                                    </div><!-- end col -->
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <select class="form-control" name="yil">
                                                @for($i=1950;$i<2017;$i++)
                                                <option value="{{$i}}">{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div><!-- end form-group -->
                                    </div><!-- end col -->
                                </div><!-- end row -->
                                <div class="form-group">
                                    <div class="checkbox-input checkbox-primary">
                                    @php
                                    $veri = "";
                                    if($kisi->bulten_istegi == 1)
                                    {
                                               $veri = "checked";     
                                    }else{
                                        $veri =  "";
                                    }
                                    @endphp
                                        <input id="bulten_istegi" name="bulten_istegi" value="1" {{$veri}}  class="styled" type="checkbox">
                                        <label for="bulten_istegi">
                                           Yeni Koleksiyonlardan Haberdar et
                                        </label>
                                    </div>
                                </div><!-- end form-group -->
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success round btn-md"><i class="fa fa-save mr-5"></i> Kaydet</button>
                                </div><!-- end form-group -->
                            </div><!-- end col -->
                           
                        </div><!-- end row -->
                    </form>
                    </div><!-- end col -->
                </div><!-- end row -->                
            </div><!-- end container -->
        </section>
        <!-- end section -->
       
@endsection