@extends("backend/b_layouts/b_layouts")

@section("css_dosyalari")

@endsection

@section("script_dosyalari")
<script type="text/javascript">
		//alert("backend");
	</script>
@endsection

@section("icerik_bilgileri")

<h1> {{$tarihler}} </h1>

		<div class="page-header card">
             <div class="card-block">
                <h5 class="m-b-10"></h5>
                    <p class="text-muted m-b-10">

					<div class="row">

<div class="col-md-6 col-xl-3">
	<div class="card bg-c-blue order-card">
				<div class="card-block">
				<h6 class="m-b-20">Kayıt Ürünler</h6>
				<h2 class="text-right"><i class="ti-shopping-cart f-left"></i><span>{{$urunsayisi}}</span></h2>
				<p class="m-b-0">Stoktaki Ürünler<span class="f-right">{{$urunsayisi}}</span></p>
				</div>
	</div>
</div>
<div class="col-md-6 col-xl-3">
	<div class="card bg-c-green order-card">
				<div class="card-block">
				<h6 class="m-b-20">Kategori Sayısı</h6>
				<h2 class="text-right"><i class="ti-tag f-left"></i><span>{{$kategorisayisi}}</span></h2>
				<p class="m-b-0">Aktif Kategori Sayısı<span class="f-right">{{$kategorisayisi}}</span></p>
				</div>
	</div>
</div>
<div class="col-md-6 col-xl-3">
	<div class="card bg-c-yellow order-card">
				<div class="card-block">
				<h6 class="m-b-20">Üyeler</h6>
				<h2 class="text-right"><i class="ti-reload f-left"></i><span>{{$uyesayisi}}</span></h2>
				<p class="m-b-0">Bu Ay<span class="f-right">0</span></p>
				</div>
	</div>
</div>
<div class="col-md-6 col-xl-3">
	<div class="card bg-c-pink order-card">
				<div class="card-block">
				<h6 class="m-b-20">Markalar</h6>
				<p></p>
				<h2 class="text-right"><i class="ti-wallet f-left"></i><span>{{$markasayisi}}</span></h2>
				<p class="m-b-0">Bu Ay<span class="f-right">{{$markasayisi}}</span></p>
				</div>
	</div>
</div>

</div>

                                  
    </p>
     </div>
    </div>


<!-- OZET BILGI -->


<div class="col-sm-12">
<div class="card tabs-card">
<div class="card-block p-0">

<ul class="nav nav-tabs md-tabs" role="tablist">
<li class="nav-item">
<a class="nav-link active" data-toggle="tab" href="#home3" role="tab"><i class="fa fa-home"></i>Markalar </a>
<div class="slide"></div>
</li>
<li class="nav-item">
<a class="nav-link" data-toggle="tab" href="#profile3" role="tab"><i class="fa fa-key"></i>Ürünler</a>
<div class="slide"></div>
</li>
<li class="nav-item">
<a class="nav-link" data-toggle="tab" href="#messages3" role="tab"><i class="fa fa-play-circle"></i>Kategoriler</a>
<div class="slide"></div>
</li>
<li class="nav-item">
<a class="nav-link" data-toggle="tab" href="#settings3" role="tab"><i class="fa fa-database"></i>Siparişler</a>
<div class="slide"></div>
</li>
</ul>

<div class="tab-content card-block">
<div class="tab-pane active" id="home3" role="tabpanel">
<div class="table-responsive">
<table class="table">

<tr>
<th>Marka Adı</th>
<td>Açıklama </td>
</tr>

@if($markalar != null)
@foreach($markalar as $marka)
<tr>
<td>{{$marka->marka_adi}}</td>
<td>{{$marka->marka_aciklama}}</td>
</tr>
@endforeach
@else
<tr>
<td> Marka Bulunamadı. </td>
</tr>
@endif

</table>
</div>
<div class="text-center">
<a href="{{route('markashow')}}" class="btn btn-outline-primary btn-round btn-sm">Load More</a>
</div>
</div>
<div class="tab-pane" id="profile3" role="tabpanel">
<div class="table-responsive">
<table class="table">
<tr>
<th>Ürün Adı</th>
<th>Ürün Kodu </th>
<th>Ürün Açıklama</th>
</tr>

@if($urunler != null)
@foreach($urunler as $urun)
<tr>
<td>{{$urun->urun_ismi}}</td>
<td>{{$urun->urun_kodu}}</td>
<td>{{$urun->aciklama}}</td>
</tr>
@endforeach
@else
<tr>
<td> Ürün Bulunamadı. </td>
</tr>
@endif
</table>
</div>
<div class="text-center">
<a  href="{{route('urunshow')}}" class="btn btn-outline-primary btn-round btn-sm">Daha Fazla</a>
</div>
</div>
<div class="tab-pane" id="messages3" role="tabpanel">
<div class="table-responsive">
<table class="table">


<tr>
<th>Kategori Adı</th>
<td>Kategori Kodu</td>
<td>Açıklama </td>
</tr>

@if($kategoriler != null)
@foreach($kategoriler as $kategori)
<tr>
<td>{{$kategori->kategori_adi}}</td>
<td>{{$kategori->kategori_aciklama}}</td>
</tr>
@endforeach
@else
<tr>
<td> Kategori Bulunamadı. </td>
</tr>
@endif

</table>
</div>
<div class="text-center">
<a href="{{route('kategorishow')}}" class="btn btn-outline-primary btn-round btn-sm">Daha Fazla</a>
</div>
</div>
<div class="tab-pane" id="settings3" role="tabpanel">
<div class="table-responsive">
<table class="table">

</table>
</div>
<div class="text-center">
<button class="btn btn-outline-primary btn-round btn-sm">Daha Fazla</button>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- OZET SON -->

@endsection