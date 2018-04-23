@extends("frontend.f_layout.f_layouts")

@section("script_files")
<script>
$(document).ready(function(){
     
  $('form').validate();
   $('form').ajaxForm({
       beforeSubmit:function(){
           swal({
               title : "<i class='fa fa-spinner fa-pulse fa-3x fa-fw'></i><span class='sr-only'>Kaydediliyor..</span>",
               text : "E-Posta Gönderiliyor..",
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
@endsection

@section("icerik")

<div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Pages</a></li>
                            <li class="active">Forgot Password</li>
                        </ul><!-- end breadcrumb -->
                    </div><!-- end col -->    
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end breadcrumbs -->
        
        <!-- start section -->
        <section class="section white-backgorund">
            <div class="container">
                <div class="row">
                    <!-- start sidebar -->
                    <div class="col-sm-3">
                        <div class="widget">
                            <h6 class="subtitle">Yeni Koleksiyon</h6>
                            <figure>
                                <a href="javascript:void(0);">
                                    <img src="{{ asset('frontend/img/products/men_06.jpg') }}" alt="collection">
                                </a>
                            </figure>
                        </div><!-- end widget -->
                    </div><!-- end col -->
                    <!-- end sidebar -->
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-sm-12 text-left">
                                <h2 class="title">Parola Resetleme</h2>
                            </div><!-- end col -->
                        </div><!-- end row -->
                        
                        <hr class="spacer-5"><hr class="spacer-20 no-border">
                        
                        <div class="row">
                            <div class="col-sm-12 col-md-10 col-lg-8">
                                <p>Parolanızı resetlemeniz için e-postanızı doğrulamanız gerekiyor
                                 ve sonra gelen posta kontrol ederek şifrenizi degiştirebilirsiniz.</p>
                                <form id="form" name="form" action="{{route('parolamiunuttum')}}" method="POST">
                                {{csrf_field()}}
                                    <div class="form-group">
                                        <label for="email">Kayıtlı E-Posta Adresi</label>
                                        <input type="email" class="form-control input-md" id="eposta" name="eposta" placeholder="E-Posta Adresi">
                                    </div><!-- end form-group -->
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success round btn-md">Parola Sıfırla</button>
                                    </div><!-- end form-group -->
                                </form><!-- end form -->
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end col -->
                </div><!-- end row -->                
            </div><!-- end container -->
        </section>
        <!-- end section -->
@endsection