@extends("backend/b_layouts/b_layouts")

@section("css_dosyalari")

@endsection

@section("script_dosyalari")
<script type="text/javascript">

$(document).ready(function(){

    $("#btnsil").click(function(){

        alert("ffff");
     /*   var id = $(this).data("urunid");  
       $.ajax({
                type:'GET',
                data : {"urunid":id},
                url:'{{ route("urun-sil") }}',
                headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()},
                success:function(basa){
                            alert(basa);
                },
                error:function(hata){
                        alert("hata");
                }
            });//AJAX SONU
            */
    });//BTN -SIL
       
 });//SAYFA CALISTI

</script>
@endsection

@section("icerik_bilgileri")
<h2>Ürünler</h2>

<div class="main-body">
    <div class="page-wrapper">

        <div class="page-header card">
            <div class="card-block">
                <h5 class="m-b-10">Ürünler Tablosu</h5>
                <p class="text-muted m-b-10">Detaylı Ürün İşlemlerini Bu Modülden Gerçekleştirebilirsiniz.</p>
                <p class="m-b-12">Toplam Kayıtlı Ürün Adeti {{$urunler->count() }} 'dir.</p>
                <ul class="breadcrumb-title b-t-default p-t-10">
                    <li class="breadcrumb-item">
                        <a href="index.html"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#!">E-Ticaret</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#!">Ürünler Listesi</a>
                    </li>
                </ul>
            </div>
        </div>


        <div class="page-body">
            <div class="row">
               <!-- URUN LISTE START -->
    @foreach($urunler as $urun)
        <div class="col-xl-4 col-md-6 col-sm-6 col-xs-12">
			<div class="card prod-view">
				<div class="prod-item text-center">
					<div class="prod-img">
					<div class="option-hover">
					<a href="{{route('urundetay')}}/{{$urun->aurun_id}}" class="btn btn-success btn-icon waves-effect waves-light m-r-15 hvr-bounce-in option-icon">
					<i class="fa fa-eye"></i>
					</a>
					<a href="{{route('urunekle')}}/{{$urun->aurun_id}}" class="btn btn-primary btn-icon waves-effect waves-light m-r-15 hvr-bounce-in option-icon">
					<i class="fa fa-edit"></i>
					
					<a href="{{route('urun-sil')}}" id="btnsil" data-urunid="{{$urun->aurun_id}}" class="btn btn-danger btn-icon waves-effect waves-light hvr-bounce-in option-icon">
					<i class="fa fa-trash-o"></i>
					</a>
                  
					</div>
					<a href="#!" class="hvr-shrink">
					<img src="{{asset('UrunResimler/uresim') }}/{{$urun->yol}}" class="img-fluid o-hidden" alt="prod1.jpg">
					</a>
					<div class="p-new"><a href="#"> New </a></div>
					</div>
						<div class="prod-info">
						<a href="#!" class="txt-muted"><h4>{{$urun->urun_kodu }}</h4></a>
						<div class="m-b-10">
						<label class="label label-success">3.5 <i class="fa fa-star"></i></label><a class="text-muted f-w-600">{{ $urun->kategori_adi }}</a>
						</div>
						<span class="prod-price"><i class="icofont icofont-cur-dollar"></i>{{ $urun->satis_fiyat }} <small class="old-price"><i class="icofont icofont-cur-dollar"></i>{{ $urun->alis_fiyat }}</small></span>
						</div>
				</div>
			</div>
		</div>
        @endforeach

               <!-- URUN LISTE END -->
             
            </div>
            <div class="md-overlay"></div>
            
        </div>
                <div>
                    <center>{{$urunler->links()}}</center>
                </div>

    </div>
</div>
@endsection