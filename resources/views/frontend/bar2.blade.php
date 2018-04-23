  <!-- start sidebar -->
  <div class="col-sm-3">
                  
                        
                  <div class="widget">
                      <h6 class="subtitle">Yeni Koleksiyon</h6>
                      <figure>
                          <a href="{{route('ayrinti')}}/{{$urunresim->urun_id}}">
                              <img src="{{ asset('UrunResimler/uresim') }}/{{$urunresim->yol}}" alt="collection">
                          </a>
                      </figure>
                  </div><!-- end widget -->
                  
                  <div class="widget">
                      <h6 class="subtitle">Öne Çıkan</h6>
                      
                      <ul class="items">
                          @if($koleksiyon != null)
                          @foreach($koleksiyon as $kolek)
                          <li> 
                              <a href="{{route('ayrinti')}}/{{$kolek->aurun_id}}" class="product-image">
                                  <img src="{{ asset('UrunResimler/uresim') }}/{{$kolek->yol}}" alt="Sample Product ">
                              </a>
                              <div class="product-details">
                                  <p class="product-name"> 
                                      <a href="{{route('ayrinti')}}/{{$kolek->aurun_id}}">{{$kolek->urun_ismi}}</a> 
                                  </p>
                                  <span class="price text-primary">$19.99</span>
                                  <div class="rate text-warning">
                                  @php
								
                                  if($kolek->tiklanma <15)
                                      $yildiz = 1;
                                  elseif($kolek->tiklanma <=35)
                                      $yildiz = 2;
                                  elseif($kolek->tiklanma <=45)
                                      $yildiz = 3;
                                  elseif($kolek->tiklanma <=65)
                                      $yildiz = 4;
                                  elseif($kolek->tiklanma >75)
                                      $yildiz = 5;
                                  
                                  @endphp
                                  @for($m = 1; $m <= $yildiz; $m++)
                                  <i class="fa fa-star"></i>
                                  @endfor
                                  </div>
                              </div>
                          </li><!-- end item -->
                          @endforeach
                          @else
<p>yok ki </p>
                          @endif 
                        
                      </ul>

                      <hr class="spacer-10 no-border">
                      <a href="{{URL('/')}}" class="btn btn-success btn-block semi-circle btn-md">Tüm Ürünler</a>
                  </div><!-- end widget -->
              </div><!-- end col -->
              <!-- end sidebar -->