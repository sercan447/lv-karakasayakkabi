 
 <!-- start sidebar -->
 <div class="col-sm-3">
                        <div class="widget">
                            <h6 class="subtitle">Hesap Ayrıntıları</h6>
                            
                            <ul class="list list-unstyled">
                                <li>
                                    <a href="my-account.html">Hesabım</a>
                                </li>
                                <li>
                                    <a href="{{route('sepet')}}">Sepetim <span class="text-primary">({{$favorisayisi}})</span></a>
                                </li>
                                
                                <!--
                                <li>
                                    <a href="order-list.html">My Order</a>
                                </li>
                                -->
                                <li class="active">
                                    <a href="{{route('favori')}}">Favorilerim <span class="text-primary">({{$sepetsayisi}})</span></a>
                                </li>
                                <li>
                                    <a href="user-information.html">Ayarlar</a>
                                </li>
                            </ul>
                        </div><!-- end widget -->
                        
                        <div class="widget">
                            <h6 class="subtitle">Yeni Ürün</h6>
                            <figure>
                                <a href="{{route('ayrinti')}}/{{$urunresim->urun_id}}">
                                    <img src="{{asset('UrunResimler/uresim')}}/{{$urunresim->yol}}" alt="collection">
                                </a>
                            </figure>
                        </div><!-- end widget -->
                        
                        <div class="widget">
                            <h6 class="subtitle">Öne Çıkan</h6>
                            
                            <ul class="items">
                                <li> 
                                    <a href="shop-single-product-v1.html" class="product-image">
                                        <img src="{{ asset('UrunResimler/uresim') }}/{{$koleksiyon->yol}}" alt="Sample Product ">
                                    </a>
                                    <div class="product-details">
                                        <p class="product-name"> 
                                            <a href="shop-single-product-v1.html">{{$koleksiyon->urun_ismi}}</a> 
                                        </p>
                                        <span class="price text-primary">$19.99</span>
                                        <div class="rate text-warning">
                                        @php
								
                                if($koleksiyon->tiklanma <15)
                                    $yildiz = 1;
                                elseif($koleksiyon->tiklanma <=35)
                                    $yildiz = 2;
                                elseif($koleksiyon->tiklanma <=45)
                                    $yildiz = 3;
                                elseif($koleksiyon->tiklanma <=65)
                                    $yildiz = 4;
                                elseif($koleksiyon->tiklanma >75)
                                    $yildiz = 5;
                                
                                @endphp
                                @for($m = 1; $m <= $yildiz; $m++)
                                <i class="fa fa-star"></i>
                                @endfor
                                        </div>
                                    </div>
                                </li><!-- end item -->
                          
                            </ul>

                            <hr class="spacer-10 no-border">
                            <a href="shop-sidebar-left.html" class="btn btn-success btn-block semi-circle btn-md">Bütün Ürünler</a>
                        </div><!-- end widget -->
                    </div><!-- end col -->
                    <!-- end sidebar -->