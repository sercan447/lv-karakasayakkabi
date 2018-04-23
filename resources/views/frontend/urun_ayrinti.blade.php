@extends("frontend.f_layout.f_layouts")

@section("script_files")
@endsection

@section("css_files")
@endsection

@section("icerik")

  <!-- start section -->
  <section class="section white-backgorund">
            <div class="container">
                <div class="row">
                    <!-- start sidebar -->
                    <div class="col-sm-4">
                        <div class='carousel slide product-slider' data-ride='carousel' data-interval="false">
                            <div class='carousel-inner'>
                                <div class='item active'>
                                    <figure>
                                        <img src='{{ asset("UrunResimler/uresim") }}/{{$urunayrinti->yol}}' alt='' />
                                    </figure>
                                </div><!-- end item -->
                                    <!--
                                <div class='item'>
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/NrmMk1Myrxc"></iframe>
                                    </div>
                                </div>
                                -->
                                        

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
                                <li data-target='.product-slider' data-slide-to='0'>
                           
                                    <img src='{{ asset("UrunResimler/uresim")}}/{{$urunayrinti->yol}}' alt='' />
                                </li>
                               
                            </ol><!-- end carousel-indicators -->
                        </div><!-- end carousel -->
                    </div><!-- end col -->
                    <!-- end sidebar -->
                    <div class="col-sm-8">
                        <div class="row">
                            <div class="col-sm-12">
                                <h2 class="title">{{$urunayrinti->urun_ismi}}</h2>
                                    <p class="text-gray alt-font">Ürün Kodu: {{$urunayrinti->urun_kodu}}</p>
                                    
                                    <ul class="list list-inline">
                                        <li><h6 class="text-danger text-xs">179.99 TL</h6></li>
                                        <li><h5 class="text-primary">79.99 TL</h5></li>
                                        <li>
                                    
                                            @php
								
                                if($urunayrinti->tiklanma <15)
                                    $yildiz = 1;
                                elseif($urunayrinti->tiklanma <=35)
                                    $yildiz = 2;
                                elseif($urunayrinti->tiklanma <=45)
                                    $yildiz = 3;
                                elseif($urunayrinti->tiklanma <=65)
                                    $yildiz = 4;
                                elseif($urunayrinti->tiklanma >75)
                                    $yildiz = 5;
                                
                                @endphp
                                @for($m = 1; $m <= $yildiz; $m++)
                                <i class="fa fa-star text-warning"></i>
                                @endfor
                                        </li>
                                        <li><a href="javascript:void(0);">(4 Yorum)</a></li>
                                    </ul>
                            </div><!-- end col -->
                        </div><!-- end row -->
                        
                        <hr class="spacer-5"><hr class="spacer-10 no-border">
                        
                        <div class="row">
                            <div class="col-sm-12">
                                <p>Ürün Açıklama</p>
                                <ul class="list alt-list">
                                    <li><i class="fa fa-check"></i>özellik 1</li>
                                    <li><i class="fa fa-check"></i> özellik 2.</li>
                                    <li><i class="fa fa-check"></i> özellik 3</li>
                                </ul>
                                <hr class="spacer-15">
                                <div class="row">
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <select class="form-control" name="select">
                                            <option value="" selected>Color</option>
                                            <option value="red">Red</option>
                                            <option value="green">Green</option>
                                            <option value="blue">Blue</option>
                                        </select>
                                    </div><!-- end col -->
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <select class="form-control" name="select">
                                            <option value="">Size</option>
                                            <option value="">S</option>
                                            <option value="">M</option>
                                            <option value="">L</option>
                                            <option value="">XL</option>
                                            <option value="">XXL</option>
                                        </select>
                                    </div><!-- end col -->
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
                                    </div><!-- end col -->
                                </div><!-- end row -->
                                <hr class="spacer-15">
                                
                                <ul class="list list-inline">
                                    <li><a href="{{route('sepetekle')}}/{{$urunayrinti->aurun_id}}" class="btn btn-success btn-md round"><i class="fa fa-shopping-basket mr-5"></i>Sepete Ekle</a></li>
                                    <li><a href="{{route('favoriekle')}}/{{$urunayrinti->aurun_id}}" class="btn btn-gray btn-md round"><i class="fa fa-heart mr-5"></i>Favorilere Ekle</a></li>
                                    <li>Ürün Paylaş: </li>
                                    <li>
                                        <ul class="social-icons style1">
                                            <li class="facebook"><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
                                            <li class="twitter"><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
                                            <li class="pinterest"><a href="javascript:void(0);"><i class="fa fa-pinterest"></i></a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end col -->
                </div><!-- end row -->
                
                <hr class="spacer-60">
                
                <div class="row">
                    <div class="col-xs-12 col-sm-3">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs style2 tabs-left">
                            <li class="active"><a href="#description" data-toggle="tab">Ürün Bilgi </a></li>
                            <li><a href="#reviews" data-toggle="tab">Yorum (4)</a></li>
                        </ul>
                    </div><!-- end col -->
                    <div class="col-xs-12 col-sm-9">
                        <!-- Tab panes -->
                        <div class="tab-content style2">
                            <div class="tab-pane active" id="description">
                                <h5>Ürün Hakkında Bilgi</h5>
                                <p>Ürün Açıklama</p>
                                
                                <hr class="spacer-15">
                                
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <dl class="dl-horizontal">
                                            <dt>Dimensions</dt>
                                            <dd>120 x 75 x 90 cm</dd>
                                            <dt>Colors</dt>
                                            <dd>white, black, brown</dd>
                                            <dt>Materials</dt>
                                            <dd>cotton</dd>
                                        </dl>
                                    </div><!-- end col -->
                                    <div class="col-sm-12 col-md-6">
                                        <dl class="dl-horizontal">
                                            <dt>Weight</dt>
                                            <dd>1.65 kg</dd>
                                            <dt>Manufacturer</dt>
                                            <dd>Istanbul</dd>
                                        </dl>
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end tab-pane -->
                            <div class="tab-pane" id="reviews">
                                <h5>Ürün hakkında yapılan yorumlar listesi</h5>
                                
                                <hr class="spacer-10 no-border">
                                
                                <div class="comments">
                                    <div class="comment-image">
                                        <figure>
                                            <img src="img/team/team_01.jpg" alt="" />
                                        </figure>
                                    </div><!-- end comments-image -->
                                    <div class="comment-content">
                                        <div class="comment-content-head">
                                            <h6 class="comment-title">Ürün ismi</h6>
                                            <ul class="list list-inline comment-meta">
                                                <li>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                </li>
                                            </ul>
                                        </div><!-- end comment-content-head -->
                                        <p>Yorum 1</p>
                                        <cite>isim soyisim</cite>
                                    </div><!-- end comment-content -->
                                </div><!-- end comments -->
                                
                                
                                <hr class="spacer-30">
                                
                                <h5>Yorum Ekle</h5>
                                <p>Ürün hakkında öneriniz ?</p>
                                        
                                <hr class="spacer-5 no-border">

                                <form>
                                    <input type="text" class="rating rating-loading" value="5" data-size="sm" title="">
                                </form>

                                <hr class="spacer-10 no-border">

                                <div class="form-group">
                                    <label for="reviewName">Ad Soyad</label>
                                    <input type="text" id="reviewName" class="form-control input-md" placeholder="Ad Soyad">
                                </div><!-- end form-group -->
                                <div class="form-group">
                                    <label for="reviewEmail">E-Posta</label>
                                    <input type="text" id="reviewEmail" class="form-control input-md" placeholder="E-Posta">
                                </div><!-- end form-group -->
                                <div class="form-group">
                                    <label for="reviewMessage">Yorum</label>
                                    <textarea id="reviewMessage" rows="5" class="form-control" placeholder="Mesajınızı yazınız"></textarea>
                                </div><!-- end form-group -->
                                <div class="form-group">
                                    <input type="submit" class="btn btn-default round btn-md" value="Mesaj Gönder">
                                </div><!-- end form-group -->
                            </div><!-- end tab-pane -->
                        </div><!-- end tab-content -->
                    </div><!-- end col -->
                </div><!-- end row -->
                
                <hr class="spacer-60">
                
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="mb-20">Sizin için Önerilenler</h4>
                    </div><!-- end col -->
                </div><!-- end row -->
                
                <div class="row">
                    <div class="col-sm-12">
                        <div id="owl-demo" class="owl-carousel column-4 owl-theme">
                        @if($ilgiliurunler != null)
                            @foreach($ilgiliurunler as $ilgili)
                            <div class="item">
                                <div class="thumbnail store style1">
                                    <div class="header">
                                        <figure>
                                            <a href="shop-single-product-v1.html">
                                                <img src="{{ asset('UrunResimler/uresim') }}/{{$ilgili->yol}}" alt="">
                                            </a>
                                        </figure>
                                    </div>
                                    <div class="caption">
                                        <h6 class="regular"><a href="shop-single-product-v1.html">{{$ilgili->urun_ismi}}</a></h6>
                                        <div class="price">
                                            <small class="amount off">$68.99</small>
                                            <span class="amount text-primary">$59.99</span>
                                        </div>
                                        <span class="product-badge bottom left text-warning">
                                        @php
								
                                        if($ilgili->tiklanma <15)
                                            $yildiz = 1;
                                        elseif($ilgili->tiklanma <=35)
                                            $yildiz = 2;
                                        elseif($ilgili->tiklanma <=45)
                                            $yildiz = 3;
                                        elseif($ilgili->tiklanma <=65)
                                            $yildiz = 4;
                                        elseif($ilgili->tiklanma >75)
                                            $yildiz = 5;
                                        
                                        @endphp
                                        @for($m = 1; $m <= $yildiz; $m++)
                                        <i class="fa fa-star"></i>
                                        @endfor
                                        </span>
                                    </div><!-- end caption -->
                                </div><!-- end thumbnail -->
                            </div><!-- end item -->
                               @endforeach             
                            @endif

                            </div><!-- end item -->
                        </div><!-- end owl carousel -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>
        <!-- end section -->

@endsection