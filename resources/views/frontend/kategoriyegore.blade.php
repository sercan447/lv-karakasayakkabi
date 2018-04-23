@extends("frontend.f_layout.f_layouts")

@section("script_files")
<script type="text/javascript">

$(document).ready(function(){      

        $("a[id='showdata']").click(function(){
           var veri = $(this).data("veri");


         $.ajax({
            url: "{{route('modal')}}/"+veri,
           // data:{"urunid":veri,"tipi":"modal"},
            type: 'GET',
       
            success: function (data) {
                   alert(data);
            },
            error: function (error) {
                alert("hata");
               
            }
        });//AJAX
    });//CLICK

});//QJUERY SONU 

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
                            <li><a href="{{URL('/')}}">Anasayfa</a></li>
                            <li><a href="#">Kategori</a></li>
                           
                        </ul><!-- end breadcrumb -->
                    </div><!-- end col -->    
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end breadcrumbs -->
        
        <!-- start section -->
        <section class="section white-backgorund">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                       
                        <div class="row column-4">
                        @if($kategoriyeGore != null)
                        @foreach($kategoriyeGore as $urun)
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
                                                <img class="front" src="{{asset('UrunResimler/uresim') }}/{{$urun->yol}}" alt="">
                                                <img class="back"  src="{{asset('UrunResimler/uresim') }}/{{$urun->yol}}" alt="">
                                            </a>
                                        </figure>
                                        <div class="icons">
                                            <a class="icon semi-circle" href="{{route('favoriekle')}}/{{$urun->aurun_id}}"><i class="fa fa-heart-o"></i></a>
                                            <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-gift"></i></a>
                                            <a id="showdata" class="icon semi-circle" href="javascript:void(0);"
                                             data-toggle="modal" data-target=".productQuickView" data-veri="{{$urun->aurun_id}}">
                                                <i class="fa fa-search"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="caption">
                                        <h6 class="regular"><a href="{{route('ayrinti')}}/{{$urun->aurun_id}}">{{$urun->urun_ismi}}</a></h6>
                                        <div class="price">
                                            <small class="amount off">$68.99</small>
                                            <span class="amount text-primary">$59.99</span>
                                        </div>
                                        <a href="{{route('sepetekle')}}/{{$urun->aurun_id}}"><i class="fa fa-cart-plus mr-5"></i>Sepete Ekle</a>
                                    </div><!-- end caption -->
                                </div><!-- end thumbnail -->
                            </div><!-- end col -->
                            @endforeach
                        @endif
                        
                        </div><!-- end row -->
                       
                        <hr class="spacer-10 no-border">
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <nav>
                                    <ul class="pagination">
                                    <li>{{$kategoriyeGore->links() }}</li>   
                                   </ul>
                                </nav>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end col -->   
                </div><!-- end row -->

                <!-- Modal Product Quick View -->
                <div class="modal fade productQuickView" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h5>Lorem ipsum dolar sit amet</h5>
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
                                                <div class='item'>
                                                    <figure>
                                                        <img src='{{ asset("frontend/img/products/men_03.jpg") }}' alt='' />
                                                    </figure>
                                                </div><!-- end item -->
                                                <div class='item'>
                                                    <figure>
                                                        <img src='{{ asset("frontend/img/products/men_04.jpg") }}' alt='' />
                                                    </figure>
                                                </div><!-- end item -->
                                                <div class='item'>
                                                    <figure>
                                                        <img src='{{ asset("frontend/img/products/men_05.jpg") }}' alt=''/>
                                                    </figure>
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
                                                <li data-target='.product-slider' data-slide-to='2'><img src='{{ asset("frontend/img/products/men_03.jpg") }}' alt='' /></li>
                                                <li data-target='.product-slider' data-slide-to='3'><img src='{{ asset("frontend/img/products/men_04.jpg") }}' alt='' /></li>
                                                <li data-target='.product-slider' data-slide-to='4'><img src='{{ asset("frontend/img/products/men_05.jpg") }}' alt='' /></li>
                                                <li data-target='.product-slider' data-slide-to='5'><img src='{{ asset("frontend/img/products/men_06.jpg") }}' alt='' /></li>
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
                                        <p>Ürün açııklama</p>
                                        <hr class="spacer-10">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-6 col-xs-12">
                                                <select class="form-control" name="select">
                                                    <option value="" selected>Renk</option>
                                                    <option value="red">Red</option>
                                                    <option value="green">Green</option>
                                                    <option value="blue">Blue</option>
                                                </select>
                                            </div><!-- end col -->
                                            <div class="col-md-4 col-sm-6 col-xs-12">
                                                <select class="form-control" name="select">
                                                    <option value="">Boyut</option>
                                                    <option value="">S</option>
                                                    <option value="">M</option>
                                                    <option value="">L</option>
                                                    <option value="">XL</option>
                                                    <option value="">XXL</option>
                                                </select>
                                            </div><!-- end col -->
                                            <div class="col-md-4 col-sm-12">
                                                <select class="form-control" name="select">
                                                    <option value="" selected>Adet</option>
                                                    <option value="">1</option>
                                                    <option value="">2</option>
                                                    <option value="">3</option>
                                                    <option value="">4</option>
                                                    <option value="">5</option>
                                                    <option value="">6</option>
                                                    <option value="">7</option>
                                                </select>
                                            </div><!-- end col -->
                                        </div><!-- end row -->
                                        <hr class="spacer-10">
                                        <ul class="list list-inline">
                                            <li><button type="button" class="btn btn-default btn-md round"><i class="fa fa-shopping-basket mr-5"></i>Sepete Ekle</button></li>
                                            <li><button type="button" class="btn btn-gray btn-md round"><i class="fa fa-heart mr-5"></i>Favorilere Ekle</button></li>
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