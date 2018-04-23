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
                            <li><a href="{{URL('/')}}">Anasayfa</a></li>
                            <li class="active">Favorilerim</li>
                        </ul><!-- end breadcrumb -->
                    </div><!-- end col -->    
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end breadcrumbs -->
        
        <!-- start section -->
        <section class="section white-backgorund">
            <div class="container">
                <div class="row">
                
                @include("frontend.bar")
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-sm-12 text-left">
                                <h2 class="title">Favorilerim</h2>
                            </div><!-- end col -->
                        </div><!-- end row -->
                        
                        <hr class="spacer-5"><hr class="spacer-20 no-border">
                        
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive">    
                                    <table class="table">
                                        <tbody>
                                            @if($favoriler != null)
                                            @foreach($favoriler as $favori)
                                            <tr>
                                                <td>
                                                    <a href="shop-single-product-v1.html">
                                                        <img width="60px" src="{{ asset('UrunResimler/uresim') }}/{{$favori->yol}}" alt="product">
                                                    </a>
                                                </td>
                                                <td>
                                                    <h6 class="regular"><a href="shop-single-product-v1.html">{{$favori->urun_ismi}}</a></h6>
                                                    <small>12x1.5 L</small>
                                                </td>
                                                <td>
                                                    <span class="text-primary">$59.99</span>
                                                </td>
                                                <td>
                                                    <a href="{{route('sepetekle')}}/{{$favori->urun_id}}" class="btn btn-success round btn-sm"><i class="fa fa-cart-plus mr-5"></i>Sepete Ekle</a>
                                                </td>
                                                <td>
                                                    <a href="{{route('favoriurunsil')}}/{{$favori->urun_id}}" class="close">×</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                     @endif
                                         
                                        </tbody>
                                    </table><!-- end table -->
                                </div><!-- end table-responsive -->
                                
                                <hr class="spacer-10 no-border">
                                
                                <a href="shop-sidebar-left.html" class="btn btn-light semi-circle btn-md">
                                    <i class="fa fa-arrow-left mr-5"></i> Gezmeye Devam et
                                </a>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end col -->
                </div><!-- end row -->                
            </div><!-- end container -->
        </section>
        <!-- end section -->
@endsection