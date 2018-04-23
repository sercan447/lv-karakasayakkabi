<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from diamondcreative.net/plus-v1.3.0/home-v5.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Nov 2017 14:56:00 GMT -->
<head>
    <title>Karakaş Ayakkabı E-Ticaret</title>
    <meta charset="utf-8">
    <meta name="description" content="Alfa Topttancılık Alışveriş">
    <meta name="author" content="Diamant Gjota" />
    <meta name="keywords" content="plus, html5, css3, template, ecommerce, e-commerce, bootstrap, responsive, creative" />
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
	
    <!--Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    
    <!-- css files -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/animate.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/swiper.css') }}" />
    
    <!-- this is default skin you can replace that with: dark.css, yellow.css, red.css ect -->
    <link id="pagestyle" rel="stylesheet" type="text/css" href="{{asset('frontend/css/default.css') }}" />
    
    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800&amp;subset=latin-ext" rel="stylesheet">
   
    <link href="{{ asset('css/sweetalert2.min.css')}}" />
    
    @yield("css_files")
</head>
    <body>
        
        <!-- start section -->
        <section class="primary-background hidden-xs">
            <div class="container-fluid">
                <div class="row grid-space-0">
                    <div class="col-sm-12">
                        <figure>
                            <a href="category.html">
                                <!--<img src="{{ asset('frontend/img/banners/top_banner.jpg') }}" alt=""/> -->
                          
                            </a>
                        </figure>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>
        <!-- end section -->
        
        <!-- start topBar -->
        <div class="topBar">
            <div class="container">
                <ul class="list-inline pull-left hidden-sm hidden-xs">
                    <li><span class="text-primary">Sorularınız için ?</span> Cep tel : +90 (531) 735 6892</li>
                </ul>
                
                <ul class="topBarNav pull-right">
                <!--
                    <li class="linkdown">
                        <a href="javascript:void(0);">
                            <i class="fa fa-usd mr-5"></i>
                            USD
                            <i class="fa fa-angle-down ml-5"></i>
                        </a>
                        <ul class="w-100">
                            <li><a href="javascript:void(0);"><i class="fa fa-eur mr-5"></i>EUR</a></li>
                            <li class="active"><a href="javascript:void(0);"><i class="fa fa-usd mr-5"></i>USD</a></li>
                            <li><a href="javascript:void(0);"><i class="fa fa-gbp mr-5"></i>GBP</a></li>
                        </ul>
                    </li>
                    -->
                    <!--
                    <li class="linkdown">
                        <a href="javascript:void(0);">
                            <img src="img/flags/flag-french.jpg" class="mr-5" alt="">
                            <span class="hidden-xs">
                                French 
                                <i class="fa fa-angle-down ml-5"></i>
                            </span>    
                        </a>
                        <ul class="w-100">
                            <li><a href="javascript:void(0);"><img src="{{ asset('frontend/img/flags/flag-english.jpg') }}" class="mr-5" alt="">English</a></li>
                            <li class="active"><a href="javascript:void(0);"><img src="{{ asset('frontend/img/flags/flag-french.jpg') }}" class="mr-5" alt="">French</a></li>
                            <li><a href="javascript:void(0);"><img src="{{ asset('frontend/img/flags/flag-german.jpg') }}" class="mr-5" alt="">German</a></li>
                            <li><a href="javascript:void(0);"><img src="{{ asset('frontend/img/flags/flag-spain.jpg') }}" class="mr-5" alt="">Spain</a></li>
                        </ul>
                      
                    </li>
                    -->
                
                    @php 
                     $sayi = 0;
                    @endphp
                    @if(Session::has("kullanici"))
                    @php
                    $favorisayisi = DB::table("krk_favori")->where("kullanici_id",Session::get("kullanici")->kullanici_id)->get();
                    $sayi = $favorisayisi->count();
                    @endphp
                    <li class="linkdown">
                        <a href="javascript:void(0);">
                            <i class="fa fa-user mr-5"></i>
                            <span class="hidden-xs">
                               Hesabım
                                <i class="fa fa-angle-down ml-5"></i>
                            </span>
                        </a>
                        <ul class="w-150">
                            <li><a href="{{route('hesabim')}}/{{Session::get('kullanici')->kullanici_id}}">Hesabım</a></li>
                            <li class="divider"></li>
                            <li><a href="{{route('paroladegistir')}}/{{Session::get('kullanici')->kullanici_id}}">Parola Değiştir</a></li>
                            <li><a href="{{route('favori')}}">Favorilerim ({{$sayi}})</a></li>
                            <li><a href="{{route('sepet')}}">Sepetim</a></li>
                            <li><a href="{{route('uyecikis')}}">Çıkış</a></li>
                          <!--   <li><a href="checkout.html">Checkout</a></li> -->
                        </ul>
                    </li>
                    @else
                    <li class="linkdown">
                        <a href="{{route('uyekayit')}}">
                            <i class="fa fa-user mr-5"></i>
                            <span class="hidden-xs">
                               Kayıt Ol
                            </span>
                        </a>
                    </li>
                    <li class="linkdown">
                        <a href="{{route('uyegiris')}}">
                            <i class="fa fa-user mr-5"></i>
                            <span class="hidden-xs">
                               Giriş Yap
                            </span>
                        </a>
                    </li>
                    @endif
                    @if(Session::has("kullanici"))
                    @php
                        $sepet = DB::table("alf_sepet")->join("alf_resimler as res","res.urun_id","=","alf_sepet.urun_id")
                                                        ->join("alf_urunler as ur","ur.aurun_id","=","alf_sepet.urun_id")
                                                        ->where("alf_sepet.kullanici_id",Session::get("kullanici")->kullanici_id)->get();
                        $sepetsayi = $sepet->count();
                    @endphp
                    <li class="linkdown">
                        <a href="{{route('sepet')}}">
                            <i class="fa fa-shopping-basket mr-5"></i>
                            <span class="hidden-xs">
                                Sepet<sup class="text-primary">({{$sepetsayi}})</sup>
                                <i class="fa fa-angle-down ml-5"></i>
                            </span>    
                        </a>
                        <ul class="cart w-250">
                            <li>
                                <div class="cart-items">
                                    <ol class="items">
                                        @if($sepet != null)
                                            @foreach($sepet as $spt)
                                        <li> 
                                            <a href="shop-single-product-v1.html" class="product-image">
                                                <img src="{{asset('UrunResimler/uresim') }}/{{$spt->yol}}" alt="Sample Product ">
                                            </a>
                                            <div class="product-details">
                                                <div class="close-icon"> 
                                                    <a href="{{route('sepeturunsil')}}/{{$spt->urun_id}}"><i class="fa fa-close"></i></a>
                                                </div>
                                                <p class="product-name"> 
                                                    <a href="{{route('ayrinti')}}/{{$spt->urun_id}}">{{$spt->urun_ismi}}</a> 
                                                </p>
                                                <strong>1</strong> x <span class="price text-primary">$59.99</span>
                                            </div><!-- end product-details -->
                                        </li><!-- end item -->
                                            @endforeach
                                        @endif
                                    </ol>
                                </div>
                            </li>

                            <li>
                                <div class="cart-footer">
                                    <a href="{{route('sepet')}}" class="pull-left"><i class="fa fa-cart-plus mr-5"></i>Sepete Git</a>
                                    <!-- <a href="checkout.html" class="pull-right"><i class="fa fa-shopping-basket mr-5"></i>Checkout</a> -->
                                </div>
                            </li>
                        </ul>
                    </li>
                    @endif
                </ul>
            </div><!-- end container -->
        </div>
        <!-- end topBar -->
        @php
        $kategoriler = DB::table("alf_kategoriler")->get();

        @endphp
        <div class="middleBar">
            <div class="container">
                <div class="row display-table">
                    <div class="col-sm-3 vertical-align text-left hidden-xs">
                        <a href="{{URL('/')}}">
                            <img width="160" src="{{ asset('frontend/img/logo-big.png') }}" alt="" />
                        </a>
                    </div><!-- end col -->
                    <div class="col-sm-7 vertical-align text-center">
                        <form id="urunara" name="urunara" action="{{URL('urunarama')}}" method="POST">
                            {{csrf_field()}}   
                        <div class="row grid-space-1">
                                <div class="col-sm-6">
                                    <input type="text" name="aranankelime" class="form-control input-lg" placeholder="Arama">
                                </div><!-- end col -->
                                <div class="col-sm-3">
                                    <select class="form-control input-lg" name="secilenkategori">
                                        <option value="tumkategori">Tüm Kategoriler</option>
                                            @if($kategoriler != null)
                                                @foreach($kategoriler as $kategori)
                                                <option value="{{$kategori->akategori_id}}">{{$kategori->kategori_adi}}</option>
                                                @endforeach
                                            @endif
<!--
                                        <optgroup label="Mens">
                                            <option value="shirts">Shirts</option>
                                        </optgroup>
-->
                                    </select>
                                </div><!-- end col -->
                                <div class="col-sm-3">
                                    <input type="submit"  class="btn btn-success btn-block btn-lg" value="Ara">
                                </div><!-- end col -->
                            </div><!-- end row -->
                        </form>
                    </div><!-- end col -->
                    <div class="col-sm-2 vertical-align header-items hidden-xs">
                        @if(Session::has("kullanici"))
                        <div class="header-item mr-5">
                            <a href="{{route('favori')}}" data-toggle="tooltip" data-placement="top" title="Favorilerim">
                                <i class="fa fa-heart-o"></i>
                                <sub>{{$sayi}}</sub>
                            </a>
                        </div>
                        @endif
                        <!--
                        <div class="header-item">
                            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Karşılaştır">
                                <i class="fa fa-refresh"></i>
                                <sub>2</sub>
                            </a>
                        </div>
                        -->
                    </div><!-- end col -->
                </div><!-- end  row -->
            </div><!-- end container -->
        </div><!-- end middleBar -->
        
        <!-- start navbar -->
        <div class="navbar yamm navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" data-toggle="collapse" data-target="#navbar-collapse-3" class="navbar-toggle">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="javascript:void(0);" class="navbar-brand visible-xs">
                        <img src="img/logo.png" alt="logo">
                    </a>
                </div>
                <div id="navbar-collapse-3" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
  
                        <!-- Collections -->
                        <li class="dropdown yamm-fw"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Koleksiyonlar<i class="fa fa-angle-down ml-5"></i></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <div class="yamm-content">
                                        <div class="row">

                                            <div class="col-xs-12 col-sm-3">  
                                            <a href="javascript:void(0);">
                                                    <figure class="zoom-out">
                                                        <img alt="" src="{{ asset('frontend/img/banners/collection_01.jpg') }}">
                                                    </figure>
                                                </a>
                                            </div><!-- end col -->
                
                                        </div><!-- end row -->
                                        
                                        <hr class="spacer-20 no-border">
                                        
                                        <div class="row">
                                         
                                            <div class="col-xs-12 col-sm-3">
                                                <div class="thumbnail store style1">
                                                    <div class="header">
                                                        <div class="badges">
                                                            <span class="product-badge top left white-backgorund text-primary semi-circle">Sale</span>
                                                            <span class="product-badge top right text-primary">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-half-o"></i>
                                                            </span>
                                                        </div>
                                                        <figure class="layer">
                                                            <img src="img/products/kids_01.jpg" alt="">
                                                        </figure>
                                                        <div class="icons">
                                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-heart-o"></i></a>
                                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-gift"></i></a>
                                                            <a class="icon semi-circle" href="javascript:void(0);" data-toggle="modal" data-target=".productQuickView"><i class="fa fa-search"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="caption">
                                                        <h6 class="thin"><a href="javascript:void(0);">Lorem Ipsum dolor sit</a></h6>
                                                        <div class="price">
                                                            <small class="amount off">$68.99</small>
                                                            <span class="amount text-primary">$59.99</span>
                                                        </div>
                                                        <a href="javascript:void(0);"><i class="fa fa-cart-plus mr-5"></i>Add to cart</a>
                                                    </div><!-- end caption -->
                                                </div><!-- end thumbnail -->
                                            </div><!-- end col -->


                                        </div><!-- end row -->
                                    </div><!-- end yamm-content -->
                                </li><!-- end li -->
                            </ul><!-- end dropdown-menu -->
                        </li><!-- end dropdown -->
                    </ul><!-- end navbar-nav -->
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown right">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                                <span class="hidden-sm">Kategoriler</span><i class="fa fa-bars ml-5"></i>
                            </a>
                            <ul class="dropdown-menu">
                            @if($kategoriler != null)
                                 @foreach($kategoriler as $kategori)
                             <li><a href="{{$kategori->akategori_id}}">{{$kategori->kategori_adi}}</a></li>
                                 @endforeach
                            @endif
                                <!--     
                                <li class="dropdown-submenu"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">Mens</a>                              
                                <ul class="dropdown-menu">
                                        <li><a href="category.html">Shirts</a></li>
                                    </ul>
                                </li>
                                -->
                                
                              
                            </ul><!-- end ul dropdown-menu -->
                        </li><!-- end dropdown -->
                    </ul><!-- end navbar-right -->
                </div><!-- end navbar collapse -->
            </div><!-- end container -->
        </div><!-- end navbar -->
        
                @yield("icerik")
        
        <!-- start footer -->
        <footer class="footer">
            <div class="container">
               
                <hr class="spacer-30">
                @php
                    $sosyalmedya = DB::table("alf_sosyalmedya")->first();
                @endphp
                <div class="row">
                    <div class="col-sm-3">
                        <h5 class="title">Karakaş Ayakkabı</h5>
                        <p>Sektördeki deneyimimizi sizleere sunmaktan onur duyarız.</p>
                        
                        <hr class="spacer-10 no-border">
                        
                        <ul class="social-icons">
                             @if($sosyalmedya->twitter != "")
                             <li class="twitter"><a href="{{$sosyalmedya->twitter}}" target="_blank"><i class="fa fa-twitter"></i></a></li>	
                             @endif 
                            @if($sosyalmedya->facebook != "")
                            <li class="facebook"><a href="{{$sosyalmedya->facebook}}" target="_blank"><i class="fa fa-facebook"></i></a></li>							
							@endif
							@if($sosyalmedya->linkedin != "")	
                            <li class="linkedin"><a href="{{$sosyalmedya->linkedin}}" target="_blank"><i class="fa fa-linkedin"></i></a></li>
							@endif
							@if($sosyalmedya->pinterest != "")	
                             <li class="pinterest"><a href="{{$sosyalmedya->pinterest}}" target="_blank"><i class="fa fa-pinterest"></i></a></li>
							@endif
							@if($sosyalmedya->instagram != "")	
                                <li class="instagram"><a href="{{$sosyalmedya->instagram}}" target="_blank"><i class="fa fa-instagram"></i></a></li>
                            @endif
							@if($sosyalmedya->googleplus != "")	
                                <li class="google"><a href="{{$sosyalmedya->googleplus}}" target="_blank"><i class="fa fa-google"></i></a></li>
                        	@endif
  
                        </ul>
                    </div><!-- end col -->
                    @if(Session::has('kullanici'))
                    <div class="col-sm-3">
                        <h5 class="title">Üyelik</h5>
                        <ul class="list alt-list">
                            <li><a href="#"><i class="fa fa-angle-right"></i>Hesabım</a></li>
                            <li><a href="{{route('favori')}}"><i class="fa fa-angle-right"></i>Favorilerim</a></li>
                            <li><a href="{{route('sepet')}}"><i class="fa fa-angle-right"></i>Sepetim</a></li>
                            <!--<li><a href="checkout.html"><i class="fa fa-angle-right"></i>Checkout</a></li> -->
                        </ul>
                    </div><!-- end col -->
                    @endif
                    <div class="col-sm-3">
                        <h5 class="title">Bilgiler</h5>
                        <ul class="list alt-list">
                            <li><a href="{{route('bizkimiz')}}"><i class="fa fa-angle-right"></i>Hakkımızda</a></li>
                            <li><a href="{{route('sorular')}}"><i class="fa fa-angle-right"></i>Sorular</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i>Politikamız</a></li>
                            <li><a href="{{route('iletisim')}}"><i class="fa fa-angle-right"></i>İletişim</a></li>
                        </ul>
                    </div><!-- end col -->
                    
                
                    <!-- end col -->
                </div><!-- end row -->
                
                <hr class="spacer-30">
                
                <div class="row text-center">
                    <div class="col-sm-12">
                        <p class="text-sm">&COPY; 2018
                         <i class="fa fa-eye text-danger"></i> YVM <a href="https://www.yvmedya.com"> Medya Reklam Yazılım Şirketi.</a>
                         </p>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </footer>
        <!-- end footer -->
        
        
        <!-- JavaScript Files -->
        <script type="text/javascript" src="{{ asset('frontend/js/jquery-3.1.1.min.js') }}"></script>
        
        <script type="text/javascript" src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/js/jquery.downCount.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/js/nouislider.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/js/jquery.sticky.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/js/pace.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/js/star-rating.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/js/wow.min.js') }}"></script>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
        <script type="text/javascript" src="{{ asset('frontend/js/gmaps.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/js/swiper.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/js/main.js') }}"></script>

        
<script src="{{ asset('js/jquery.form.min.js') }}" ></script>
<script src="{{ asset('js/jquery.validate.min.js') }}" ></script>
<script src="{{ asset('js/messages_tr.js') }}" ></script>
<script src="{{ asset('js/sweetalert2.all.min.js')}}" ></script>

        @yield("script_files")
    </body>

<!-- Mirrored from diamondcreative.net/plus-v1.3.0/home-v5.html by HTTrack Website Copier/3.x 
[XR&CO'2014], Wed, 15 Nov 2017 14:56:08 GMT -->



</html>