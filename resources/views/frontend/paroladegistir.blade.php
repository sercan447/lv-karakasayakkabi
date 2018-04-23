@extends("frontend.f_layout.f_layouts")

@section("script_files")
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
@endsection

@section("icerik")

<div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Pages</a></li>
                            <li class="active">Parola Değiştir</li>
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
                                <h2 class="title">Parola Değiştir</h2>
                            </div><!-- end col -->
                        </div><!-- end row -->
                        
                        <hr class="spacer-5"><hr class="spacer-20 no-border">
                        
                        <div class="row">
                            <div class="col-sm-12 col-md-10 col-lg-8">
                                
                                <form id="form" name="form" action="" method="POST">
                                {{csrf_field()}}
                                <div class="col-md-9">
                                <div class="form-group">
                                            <label for="eskiparola">Eski Parola <span class="text-danger">*</span></label>
                                            <input id="eskiparola" type="password" placeholder="Eski Parola Giriniz." name="eskiparola" class="form-control input-sm required">
                                        </div>
                                        <div class="form-group">
                                            <label for="yeniparola">Parola <span class="text-danger">*</span></label>
                                            <input id="yeniparola" type="password" placeholder="Yeni Parola Giriniz." name="yeniparola" class="form-control input-sm required">
                                        </div><!-- end form-group -->
                                        <div class="form-group">
                                            <label for="yeniparolatekrar">Yeni Parola Tekrar <span class="text-danger">*</span></label>
                                            <input id="yeniparolatekrar" type="password" placeholder="Yeni Parola Tekrar Giriniz." name="yeniparolatekrar" class="form-control input-sm required">
                                        </div><!-- end form-group -->
                                        <div class="form-group">
                                        <button type="submit" class="btn btn-success round btn-md">Parola Sıfırla</button>
                                    </div><!-- end form-group -->
                            </div><!-- end col -->
                                    
                                </form><!-- end form -->
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end col -->
                </div><!-- end row -->                
            </div><!-- end container -->
        </section>
        <!-- end section -->
@endsection