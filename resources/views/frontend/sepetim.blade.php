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
                            <li><a href="#">Sepetim</a></li>
                          
                        </ul><!-- end breadcrumb -->
                    </div><!-- end col -->    
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end breadcrumbs -->
        
        <!-- start section -->
        <section class="section white-backgorund">
            <div class="container">
               @include("frontend.bar")
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-sm-12 text-left">
                                <h2 class="title">Sepetim</h2>
                            </div><!-- end col -->
                       </div><!-- end row -->
                        
                        <hr class="spacer-5"><hr class="spacer-20 no-border">
                        
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive">    
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th colspan="2">Ürünler</th>
                                                <th>Fiyat</th>
                                                <th>Adet</th>
                                                <th colspan="2">Toplam</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($urunler as $spt)
                                            <tr>
                                                <td>
                                                    <a href="shop-single-product-v1.html">
                                                        <img width="60px" src="{{ asset('UrunResimler/uresim') }}/{{$spt->yol}}" alt="product">
                                                    </a>
                                                </td>
                                                <td>
                                                    <h6 class="regular"><a href="shop-single-product-v1.html">{{$spt->urun_ismi}}</a></h6>
                                                    <p>{{$spt->aciklama}}</p>
                                                </td>
                                                <td>
                                                    <span>$59.99</span>
                                                </td>
                                                <td>
                                                    <select class="form-control" name="select">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <span class="text-primary">$59.99</span>
                                                </td>
                                                <td>
                                                    <a href="{{route('sepeturunsil')}}/{{$spt->urun_id}}" class="close">×</a>
                                                </td>
                                            </tr>
                                          @endforeach
                                            
                                        </tbody>
                                    </table><!-- end table -->
                                </div><!-- end table-responsive -->
                                
                                <hr class="spacer-10 no-border">
                                
                                <a href="{{URL('/')}}" class="btn btn-light semi-circle btn-md pull-left">
                                    <i class="fa fa-arrow-left mr-5"></i> Alışverişe Devam Et
                                </a>
                                <!--
                                <a href="checkout.html" class="btn btn-default semi-circle btn-md pull-right">
                                    Checkout <i class="fa fa-arrow-right ml-5"></i>
                                </a>
                                -->
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end col -->
                </div><!-- end row -->                
            </div><!-- end container -->
        </section>
        <!-- end section -->
@endsection