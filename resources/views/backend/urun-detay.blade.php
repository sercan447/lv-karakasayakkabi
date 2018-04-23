@extends("backend/b_layouts/b_layouts")

@section("css_dosyalari")
<!--
<link rel="stylesheet" type="text/css" href="{{ asset('backend/bower_components/jquery-bar-rating/css/bars-1to10.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('backend/bower_components/jquery-bar-rating/css/bars-horizontal.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('backend/bower_components/jquery-bar-rating/css/bars-movie.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('backend/bower_components/jquery-bar-rating/css/bars-pill.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('backend/bower_components/jquery-bar-rating/css/bars-reversed.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('backend/bower_components/jquery-bar-rating/css/bars-square.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('backend/bower_components/jquery-bar-rating/css/css-stars.css') }}">
-->
<link rel="stylesheet" type="text/css" href="{{ asset('backend/bower_components/slick-carousel/css/slick.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('backend/bower_components/slick-carousel/css/slick-theme.css') }}">

@endsection

@section("script_dosyalari")
<script src="{{ asset('backend/bower_components/slick-carousel/js/slick.min.js') }}"></script>
<script src="{{ asset('backend/bower_components/modernizr/js/css-scrollbars.js') }}"></script>
<script src="{{ asset('backend/bower_components/jquery-bar-rating/js/jquery.barrating.min.js') }}"></script>
<script src="{{ asset('backend/assets/pages/rating/rating.js') }}"></script>
<script src="{{ asset('backend/assets/pages/product-detail/product-detail.js') }}"></script>
<script src="{{ asset('backend/assets/js/pcoded.min.js') }}"></script>

@endsection

@section("icerik_bilgileri")

<div class="page-header card">
<div class="card-block">
<h5 class="m-b-10">Ürün Detay</h5>
<p class="text-muted m-b-10">Ürününüz ile ilgili detaylı bilgiler alabilirsiniz.</p>
<ul class="breadcrumb-title b-t-default p-t-10">
<li class="breadcrumb-item">
<a href="index.html"> <i class="fa fa-home"></i> </a>
</li>
<li class="breadcrumb-item"><a href="#!">E-Ticaret</a>
</li>
<li class="breadcrumb-item"><a href="#!">Ürün Detay</a>
</li>
</ul>
</div>
</div>

@php
    $resimler = DB::table("alf_resimler")->where("urun_id",$urun->aurun_id)->get();
@endphp

<div class="page-body">
<div class="row">
<div class="col-md-12">

<div class="card product-detail-page">
<div class="card-block">
<div class="row">
<div class="col-lg-5 col-xs-12">
<div class="port_details_all_img row">
<div class="col-lg-12 m-b-15">
<div id="big_banner">
    @if($resimler != null)
@foreach($resimler as $resim)
<div class="port_big_img">
<img class="img img-fluid" src="{{ asset('UrunResimler/uresim')}}/{{$resim->yol}}" alt="Big_ Details">
</div>
@endforeach  
@endif

</div>
</div>
<div class="col-lg-12 product-right">
<div id="small_banner">
@foreach($resimler as $resim)
<div>
<img class="img img-fluid" src="{{ asset('UrunResimler/uresim')}}/{{$resim->yol}}" alt="small-details">
</div>
@endforeach 

</div>
</div>
</div>
</div>
<div class="col-lg-7 col-xs-12 product-detail" id="product-detail">
<div class="row">
<div>
<div class="col-lg-12">
<span class="txt-muted d-inline-block">Ürün Kodu : {{ $urun->urun_kodu }} </span>

</div>
<div class="col-lg-12">
<h4 class="pro-desc">{{ $urun->urun_ismi }}</h4>
</div>
<div class="col-lg-12">
<span class="txt-muted"> Marka : {{$urun->marka_adi}} </span>
</div>
<div class="stars stars-example-css m-t-15 detail-stars col-lg-12">
<select id="product-view" class="rating-star" name="rating" autocomplete="off">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
</select>
</div>
<div class="col-lg-12">
<span class="text-primary product-price"><i class="icofont icofont-cur-dollar"></i>{{$urun->satis_fiyat}}</span> <span class="done-task txt-muted">{{$urun->alis_fiyat}}</span>
<hr>
<p>
{{$urun->aciklama}}
</p>
<hr>
</div>
<div class="col-xl-3 col-sm-12">
<div class="p-l-0 m-b-25">
<div class="input-group">
<span class="input-group-btn">

<span class="icofont icofont-minus m-0"></span>
</button>
</span>

</button>
 </span>
</div>
</div>
</div>
<div class="col-lg-12 col-sm-12 mob-product-btn">
<a href="{{route('urunekle')}}/{{$urun->aurun_id}}" class="btn btn-primary waves-effect waves-light m-r-20">
<i class="icofont icofont-cart-alt f-16"></i><span class="m-l-10">Düzenle</span>
</a>

</div>
</div>
</div>


</div>
</div>

<div class="card product-detail-page">
<ul class="nav nav-tabs md-tabs tab-timeline" role="tablist">
<li class="nav-item">
<a class="nav-link active f-18 p-b-0" data-toggle="tab" href="#description" role="tab">Açıklama</a>
<div class="slide"></div>
</li>
<li class="nav-item m-b-0">
<a class="nav-link f-18 p-b-0" data-toggle="tab" href="#review" role="tab">Gözden geçir</a>
<div class="slide"></div>
</li>
<li class="nav-item m-b-0">
<a class="nav-link f-18 p-b-0" data-toggle="tab" href="#sizeguide" role="tab">Ebat</a>
<div class="slide"></div>
</li>
<li class="nav-item m-b-0">
<a class="nav-link f-18 p-b-0" data-toggle="tab" href="#about" role="tab">Bilgi</a>
<div class="slide"></div>
</li>
</ul>
</div>


<div class="card">
<div class="card-block">

<div class="tab-content bg-white">
<div class="tab-pane active" id="description" role="tabpanel">
<p>--</p>
</div>
<div class="tab-pane" id="review" role="tabpanel">
<p>--</p>
</div>
<div class="tab-pane" id="sizeguide" role="tabpanel">
<p>--</p>
</div>
<div class="tab-pane" id="about" role="tabpanel">
<p>---</p>
</div>
</div>
</div>
</div>

</div>

</div>
</div>


@endsection