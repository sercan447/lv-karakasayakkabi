@extends("frontend.f_layout.f_layouts")

@section("script_files")
@endsection

@section("css_files")
@endsection

@section("icerik")
<div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <ul>
                            <li><a href="#">Anasayfa</a></li>
                            <li><a href="#">Üyelik Girişi</a></li>
                         
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
                            <h6 class="subtitle">New Collection</h6>
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
                                <h2 class="title">Üye Girişi</h2>
                            </div><!-- end col -->
                        </div><!-- end row -->
                        
                        <hr class="spacer-5"><hr class="spacer-20 no-border">
                        
                        <div class="row">
                            <div class="col-sm-12 col-md-10 col-lg-8">
                                <form class="form-horizontal" id="uyegiris" name="uyegiris" action="{{route('uyegiris')}}" method="POST">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label for="email" class="col-sm-2 control-label">E-Posta</label>
                                        <div class="col-sm-10">
                                          <input type="email" class="form-control input-md" id="eposta" name="eposta" placeholder="Email">
                                        </div>
                                    </div><!-- end form-group -->
                                    <div class="form-group">
                                        <label for="password" class="col-sm-2 control-label">Parola</label>
                                        <div class="col-sm-10">
                                          <input type="password" class="form-control input-md" id="parola" name="parola" placeholder="Password">
                                        </div>
                                    </div><!-- end form-group -->
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <div class="checkbox-input mb-10">
                                                <input id="remember" class="styled" type="checkbox">
                                                <label for="remember">
                                                    Beni Hatırla
                                                </label>
                                            </div><!-- end checkbox-input -->
                                        </div><!-- end col -->
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <label><a href="{{URL('parolamiunuttum')}}">Parolamı Unuttum</a></label>
                                        </div>
                                    </div><!-- end form-group -->
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn btn-success round btn-md"><i class="fa fa-lock mr-5"></i> Giriş</button>
                                        
                                        </div>
                                    </div><!-- end form-group -->
                                </form>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end col -->
                </div><!-- end row -->                
            </div><!-- end container -->
        </section>
        <!-- end section -->
@endsection