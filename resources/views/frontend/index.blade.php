@extends("frontend.f_layout.f_layouts")

@section("script_files")
@endsection

@section("css_files")
@endsection

@section("icerik")



        <!-- start section -->
        <section class="section light-backgorund">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-md-3">
                        <div class="navbar-vertical">
                            <ul class="nav nav-stacked">
                                <li class="header">
                                    <h6 class="text-uppercase">Kategoriler <i class="fa fa-navicon pull-right"></i></h6>
                                </li>
                                @if($kategoriler != null)
                                     @foreach($kategoriler as $kategori)
                                 <li><a href="{{route('kategoriliste')}}/{{$kategori->akategori_id}}">{{$kategori->kategori_adi}}</a></li>
                                    @endforeach
                                @endif
                             <!--
                                <li>
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                      Womens <i class="fa fa-angle-right pull-right"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0);">Dresses</a></li>
                                    </ul>
                                </li>
                                -->
                                 
                            </ul>
                        </div><!-- end navbar-vertical -->
                    </div><!-- end col -->
                    <div class="col-sm-8 col-md-9">
                        <div class="owl-carousel slider owl-theme">
                            <div class="item">
                                <figure>
                                    <a href="javascript:void(0);">
                                        <img src="{{ asset('UrunResimler/logo-slider/slid-1.jpg') }}"  alt=""/>
                                    </a>
                                </figure>
                            </div><!-- end item -->
                            <div class="item">
                                <figure>
                                    <a href="javascript:void(0);">
                                        <img src="{{ asset('UrunResimler/logo-slider/slid-2.jpg') }}" alt=""/>
                                    </a>
                                </figure>
                            </div><!-- end item -->
                            <div class="item">
                                <figure>
                                    <a href="javascript:void(0);">
                                        <img src="{{ asset('UrunResimler/logo-slider/slid-3.jpg') }}" alt=""/>
                                    </a>
                                </figure>
                            </div><!-- end item -->
                        </div><!-- end owl carousel -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>
        <!-- end section -->
        
        
        <!-- start section -->
        <section class="section white-background">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="title-wrap">
                            <h2 class="title"><span class="text-primary">Yeni</span> Eklenenler</h2>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
                

                
                <div class="row column-4">
                    @php $yildiz = 0; @endphp
            @if($urunler != null)
                @foreach($urunler as $urun)
                    <div class="col-sm-6 col-md-3">
                        <div class="thumbnail store style1">
                            <div class="header">
                                <div class="badges">
                                    <!--
                                    <span class="product-badge top left primary-background text-white semi-circle">Sale</span>
                                   -->
                                    <span class="product-badge top right text-warning">
                                    @php
								
									if($urun->tiklanma <15)
										$yildiz = 1;
									elseif($urun->tiklanma <=35)
										$yildiz = 2;
									elseif($urun->tiklanma <=45)
										$yildiz = 3;
									elseif($urun->tiklanma <=65)
										$yildiz = 4;
									elseif($urun->tiklanma >75)
										$yildiz = 5;
									
									@endphp
									@for($m = 1; $m <= $yildiz; $m++)
                                    <i class="fa fa-star"></i>
                                    @endfor
                                    
                                    </span>
                                </div>
                                <figure class="layer">
                                    <a href="javascript:void(0);">
                                        <img class="front" src="{{ asset('UrunResimler/uresim/'.$urun->yol) }}" alt="">
                                        <img class="back" src="{{ asset('UrunResimler/uresim/'.$urun->yol) }}" alt="">
                                    </a>
                                </figure>
                                <div class="icons">
                                    <a class="icon semi-circle" href="{{route('favoriekle')}}/{{$urun->aurun_id}}"><i class="fa fa-heart-o"></i></a>
                                    <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-gift"></i></a>
                                    <a class="icon semi-circle" href="javascript:void(0);" data-toggle="modal" 
                                                    data-target=".productQuickView"><i class="fa fa-search"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="caption">
                                <h6 class="regular"><a href="{{route('ayrinti')}}/{{$urun->aurun_id}}">{{$urun->urun_ismi}}</a></h6>
                                <div class="price">
                                    <small class="amount off">100.00 TL</small>
                                    <span class="amount text-primary">59.99 TL</span>
                                </div>
                                <a href="{{route('sepetekle')}}/{{$urun->aurun_id}}"><i class="fa fa-cart-plus mr-5"></i>Sepete Ekle</a>
                            </div><!-- end caption -->
                        </div><!-- end thumbnail -->
                    </div><!-- end col -->
                    @endforeach
                @endif
                </div><!-- end row -->

              
                                
                <hr class="spacer-30 no-border"/>
                
                <div class="row">
                    <div class="col-sm-6">
                        <div class="box-banner-img">
                            <figure>
                                <a href="javascript:void(0);">
                                    <img src="{{asset('resim-yok.png')}}" alt="reklam 1"/>
                                </a>
                            </figure>
                        </div><!-- end box-banner-img -->
                    </div><!-- end col -->
                    <div class="col-sm-6">
                        <div class="box-banner-img">
                            <figure>
                                <a href="javascript:void(0);">
                                    <img src="{{asset('resim-yok.png')}}" alt="reklam 2"/>
                                </a>
                            </figure>
                        </div><!-- end box-banner-img -->
                    </div><!-- end col -->
                </div><!-- end row -->
                
                <hr class="spacer-30 no-border"/>
                
                <div class="row">
                    <div class="col-sm-12">
                        <div class="title-wrap">
                            <h2 class="title"><span class="text-primary">Popüler</span> Ürünler</h2>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
                
                <div class="row">
                    <div class="col-sm-12">
                        <div class="owl-carousel column-4 owl-theme">
                        @if($eniyiurunler != null)
                            @foreach($eniyiurunler as $eniyi)
                        <!-- ıtem start -->
                            <div class="item">
                                <div class="thumbnail store style1">
                                    <div class="header">
                                        <figure class="layer">
                                            <a href="javascript:void(0);">
                                                <img src="{{ asset('UrunResimler/uresim/'.$eniyi->yol) }}" alt="">
                                            </a>
                                        </figure>
                                        <div class="icons">
                                            <a class="icon semi-circle" href="{{route('favoriekle')}}/{{$eniyi->aurun_id}}"><i class="fa fa-heart-o"></i></a>
                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-gift"></i></a>
                                            <a class="icon semi-circle" href="javascript:void(0);" data-toggle="modal" data-target=".productQuickView"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="caption">
                                        <h6 class="regular">
                                            <a href="{{route('ayrinti')}}/{{$urun->aurun_id}}"> {{$eniyi->urun_ismi}}</a>
                                        </h6>
                                        <div class="price">
                                            <small class="amount off">189 TL</small>
                                            <span class="amount text-primary">100 TL</span>
                                        </div>
                                        <a href="{{route('sepetekle')}}/{{$eniyi->aurun_id}}"><i class="fa fa-cart-plus mr-5"></i>Sepete Ekle</a>
                                    </div><!-- end caption -->
                                </div><!-- end thumbnail -->
                            </div><!-- end item -->
                            @endforeach
                        @endif
                        </div><!-- end owl carousel -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>
        <!-- end section -->
        
        
        <!-- start section -->
        <!--
        <section class="section light-backgorund">
            <div class="container">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="owl-carousel product-showcase owl-theme">
                            
                            <div class="product">
                                <div class="row">
                                    <div class="col-sm-4 vertical-align">
                                        <figure>
                                            <a href="shop-single-product-v1.html"> 
                                                <img alt="img" src="{{ asset('frontend/img/products/men_03.jpg') }}">
                                            </a>
                                        </figure>
                                    </div>

                                    <div class="col-sm-8 vertical-align">
                                        <h4><a href="shop-single-product-v1.html">SÜRELİ URUN</a></h4>
                                        <ul class="list list-inline">
                                            <li><del class="text-danger">$99.99</del></li>
                                            <li><h5 class="text-primary">$49.99</h5></li>
                                            <li>
                                                <i class="fa fa-star text-warning"></i>
                                                <i class="fa fa-star text-warning"></i>
                                                <i class="fa fa-star text-warning"></i>
                                                <i class="fa fa-star text-warning"></i>
                                                <i class="fa fa-star-half-o text-warning"></i>
                                            </li>
                                        </ul>
                                        <ul class="countdown list-inline">
                                            <li class="round">
                                                <span class="days">00</span>
                                                <p>Days</p>
                                            </li>
                                            <li class="round">
                                                <span class="hours">00</span>
                                                <p>Hours</p>
                                            </li>
                                            <li class="round">
                                                <span class="minutes">00</span>
                                                <p>Mins</p>
                                            </li>
                                            <li class="round">
                                                <span class="seconds">00</span>
                                                <p>Secs</p>
                                            </li>
                                        </ul>

                                        <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie
                                        consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan
                                        et iusto odio dignissim qui blandit praesent luptatum </p>

                                        <a title="Add to Cart" class="btn btn-success btn-sm semi-circle"> 
                                            <i class="fa fa-shopping-cart mr-5"></i> Add to Cart
                                        </a>
                                    </div
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </section>
-->
        <!-- end section -->
        
        
        <!-- start section -->
        <section class="section image-background layer-dark" style="background-image: url({{ asset('frontend/img/slider/slider_03.jpg') }} );">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="title-wrap">
                            <h2 class="title text-white">Diğer Kategoriler</h2>
                            <p class="text-white">Farklı kategorilerdeki bazı ürünler.</p>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
                
                <div class="row">
                    <div class="col-sm-12">
                        <div class="owl-carousel column-5 owl-theme">

                                @foreach($farklikategoriurun as $farkli)
                            <div class="cat-item">
                                <div class="cat-img">
                                    <figure>
                                        <a href="{{route('ayrinti')}}/{{$farkli->aurun_id}}">
                                            <img src="{{ asset('UrunResimler/uresim') }}/{{$farkli->yol}}" />
                                        </a>
                                    </figure>
                                </div><!-- end cat-img -->
                                <div class="cat-title">
                                    <h6><a href="javascript:void(0)">{{$farkli->aurun_id}}</a></h6>
                                </div><!-- end cat-title -->
                            </div><!-- end cat-item -->
                                @endforeach
                   
                        </div><!-- end owl carousel -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>
        <!-- end section -->
        
        
        <!-- start section -->
        <section class="section white-backgorund">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="title-wrap">
                          <!--  <h2 class="title"><span class="text-primary">Son</span> Haberler</h2> -->
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
                
                <div class="row">
                    <div class="col-sm-12">
                        <div id="owl-demo" class="owl-carousel column-3 owl-theme">

                            <!--
                            <div class="item">
                                <div class="thumbnail blog">
                                    <div class="header">
                                        <figure>
                                            <img src="{{ asset('frontend/img/blog/blog_01.jpg') }}" alt="">
                                        </figure>
                                        <div class="meta">
                                            <span><i class="fa fa-calendar mr-5"></i>Oct 25, 2016</span>
                                            <span><i class="fa fa-comment mr-5"></i>(15)</span>
                                            <span><i class="fa fa-heart mr-5"></i>(35)</span>
                                        </div>
                                    </div>
                                    <div class="caption">
                                        <h6><a href="blog-article-v1.html">Care & Clean Instructions</a></h6>
                                        <div class="author-category">
                                            <span class="author mr-20">
                                                <i class="fa fa-user mr-5"></i><a href="javascript:void(0);">Joe Doe</a>
                                            </span>
                                            <span class="category">
                                                <a href="javascript:void(0);">Post Formats</a>
                                            </span>
                                        </div>
                                        <p>Aenean semper lacus sed molestie sollicitudin. In semper, tellus id posuere interdum, est justo faucibus quam, sed eleifend arcu nulla id eros.</p>
                                        <a href="blog-article-v1.html" class="btn btn-default semi-circle btn-sm">Read more</a>
                                    </div>
                                  
                                </div>
                            </div>
                            -->
                            <!-- end item -->
                        
                        </div><!-- end owl carousel -->
                    </div><!-- end col -->
                </div><!-- end row -->
                
                <hr class="spacer-30 no-border"/>
                
                <div class="row">
                    <div class="col-sm-4">
                        <div class="widget">
                            <h5 class="subtitle text-uppercase"><span class="text-primary">Yeni</span> Ürünler</h5>
                            
                            <ul class="items">
                                @if($enyeni != null)
                                @foreach($enyeni as $yeni)
                                <li> 
                                    <a href="shop-single-product-v1.html" class="product-image">
                                        <img src="{{ asset('UrunResimler/uresim')}}/{{$yeni->yol}}" alt="{{$yeni->urun_ismi}}">
                                    </a>
                                    <div class="product-details">
                                        <h6 class="regular"> 
                                            <a href="shop-single-product-v1.html">{{$yeni->urun_ismi}}</a> 
                                        </h6>
                                        <span class="price text-primary">$19.99</span>
                                        <div class="rate text-warning">
                                        @php
								
                                if($yeni->tiklanma <15)
                                    $yildiz = 1;
                                elseif($yeni->tiklanma <=35)
                                    $yildiz = 2;
                                elseif($yeni->tiklanma <=45)
                                    $yildiz = 3;
                                elseif($yeni->tiklanma <=65)
                                    $yildiz = 4;
                                elseif($yeni->tiklanma >75)
                                    $yildiz = 5;
                                
                                @endphp
                                @for($m = 1; $m <= $yildiz; $m++)
                                <i class="fa fa-star"></i>
                                @endfor
                                            
                                        </div>
                                    </div>
                                </li><!-- end item -->
                              @endforeach
                              @endif
                            </ul>
                        </div><!-- end widget -->
                    </div><!-- end col -->
                    
                    <div class="col-sm-4">
                        <div class="widget">
                            <h5 class="subtitle text-uppercase"><span class="text-primary">En Çok</span> Satılanlar</h5>
                            
                            <ul class="items">
                                <li> 
                                    <a href="shop-single-product-v1.html" class="product-image">
                                        <img src="{{ asset('frontend/img/products/men_02.jpg') }}" alt="Sample Product ">
                                    </a>
                                    <div class="product-details">
                                        <h6 class="regular"> 
                                            <a href="shop-single-product-v1.html">SATILAN</a> 
                                        </h6>
                                        <span class="price text-primary">$19.99</span>
                                        <div class="rate text-warning">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                </li><!-- end item -->
                          
                            </ul>
                        </div><!-- end widget -->
                    </div><!-- end col -->
                    
                    <div class="col-sm-4">
                        <div class="widget">
                            <h5 class="subtitle text-uppercase"><span class="text-primary">En Çok</span> Görüntülenenler</h5>
                            
                            <ul class="items">
                            @if($encokgoruntu != null)
                            @foreach($encokgoruntu as $encok)
                            <li> 
                                <a href="shop-single-product-v1.html" class="product-image">
                                    <img src="{{ asset('UrunResimler/uresim')}}/{{$encok->yol}}" alt="{{$encok->urun_ismi}}">
                                </a>
                                <div class="product-details">
                                    <h6 class="regular"> 
                                        <a href="shop-single-product-v1.html">{{$encok->urun_ismi}}</a> 
                                    </h6>
                                    <span class="price text-primary">$19.99</span>
                                    <div class="rate text-warning">
                                    @php
                            
                            if($encok->tiklanma <15)
                                $yildiz = 1;
                            elseif($encok->tiklanma <=35)
                                $yildiz = 2;
                            elseif($encok->tiklanma <=45)
                                $yildiz = 3;
                            elseif($encok->tiklanma <=65)
                                $yildiz = 4;
                            elseif($encok->tiklanma >75)
                                $yildiz = 5;
                            
                            @endphp
                            @for($m = 1; $m <= $yildiz; $m++)
                            <i class="fa fa-star"></i>
                            @endfor
                                        
                                    </div>
                                </div>
                            </li><!-- end item -->
                          @endforeach
                          @endif
                              
                            </ul>
                        </div><!-- end widget -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>
        <!-- end section -->
        
        
        <!-- start section -->
        <!--
        <section class="primary-background">
            <div class="container">
                <div class="box-banner-wide primary-background">
                    <div class="row">
                        <div class="col-sm-4 vertical-align">
                            <h2 class="alt-font text-uppercase text-white">
                                Free <span class="regular">Delivery days!</span>
                            </h2>
                        </div>
                        <div class="col-sm-4 vertical-align">
                            <p class="mt-20">Typi non habent claritatem insitam, est usus legentis in iis qui facit eorum claritatem.</p>
                        </div>
                        <div class="col-sm-4 vertical-align text-right">
                            <a target="_blank" href="https://wrapbootstrap.com/theme/plus-responsive-e-commerce-template-WB0R2CN86" class="btn btn-light semi-circle btn-md">Purchase</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end section -->
        
        <!-- start section -->
        <section>
            <div class="container">
                <!-- Modal Product Quick View -->
                <div class="modal fade productQuickView" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h5>Ürün ismi</h5>
                            </div><!-- end modal-header -->
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class='carousel slide product-slider' data-ride='carousel' data-interval="false">
                                            <div class='carousel-inner'>
                                                <div class='item active'>
                                                    <figure>
                                                        <img src='{{ asset("frontend/img/products/men_01.jpg") }}' alt='' />
                                                    </figure>
                                                </div><!-- end item -->
                                                <div class='item'>
                                                    <div class="embed-responsive embed-responsive-16by9">
                                                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/NrmMk1Myrxc"></iframe>
                                                    </div>
                                                </div><!-- end item -->
                                                        <!-- Arrows -->
                                                <a class='left carousel-control' href='.html' data-slide='prev'>
                                                    <span class='fa fa-angle-left'></span>
                                                </a>
                                                <a class='right carousel-control' href='.html' data-slide='next'>
                                                    <span class='fa fa-angle-right'></span>
                                                </a>
                                            </div><!-- end carousel-inner -->

                                            <!-- thumbs -->
                                            <ol class='carousel-indicators mCustomScrollbar meartlab'>
                                                <li data-target='.product-slider' data-slide-to='0' class='active'><img src='img/products/men_01.jpg' alt='' /></li>
                                                <li data-target='.product-slider' data-slide-to='1'><img src='{{ asset("frontend/img/products/men_02.jpg") }}' alt='' /></li>
                                               
                                            </ol><!-- end carousel-indicators -->
                                        </div><!-- end carousel -->
                                    </div><!-- end col -->
                                    <div class="col-sm-7">
                                        <p class="text-gray alt-font">Ürün Kodu: 1032446</p>

                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star-half-o text-warning"></i>
                                        <span>(12 Yorum)</span>
                                        <h4 class="text-primary">$79.00</h4>
                                        <p>Ürün Açıklama</p>
                                        <hr class="spacer-10">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-6 col-xs-12">
                                                <select class="form-control" name="select">
                                                    <option value="" selected>Renkler</option>
                                                    <option value="red">Red</option>
                                                    <option value="green">Green</option>
                                                    <option value="blue">Blue</option>
                                                </select>
                                            </div>
                                            <!-- end col -->
                                            <!--
                                            <div class="col-md-4 col-sm-6 col-xs-12">
                                                <select class="form-control" name="select">
                                                    <option value="">Size</option>
                                                    <option value="">S</option>
                                                    <option value="">M</option>
                                                    <option value="">L</option>
                                                    <option value="">XL</option>
                                                    <option value="">XXL</option>
                                                </select>
                                            </div>
                                            -->
                                            <!-- end col -->
                                            <!--
                                            <div class="col-md-4 col-sm-12">
                                                <select class="form-control" name="select">
                                                    <option value="" selected>QTY</option>
                                                    <option value="">1</option>
                                                    <option value="">2</option>
                                                    <option value="">3</option>
                                                    <option value="">4</option>
                                                    <option value="">5</option>
                                                    <option value="">6</option>
                                                    <option value="">7</option>
                                                </select>
                                            </div>
                                            -->

                                            <!-- end col -->
                                        </div><!-- end row -->
                                        <hr class="spacer-10">
                                        <ul class="list list-inline">
                                            <li><button type="button" class="btn btn-default btn-md round"><i class="fa fa-shopping-basket mr-5"></i>Sepete Ekle</button></li>
                                            <li><button type="button" class="btn btn-gray btn-md round"><i class="fa fa-heart mr-5"></i>Favorilerim</button></li>
                                        </ul>
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end modal-body -->
                        </div><!-- end modal-content -->
                    </div><!-- end modal-dialog -->
                </div><!-- end productRewiew -->
            </div><!-- end container -->
        </section>
        <!-- end section -->
       
@endsection