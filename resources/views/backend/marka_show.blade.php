@extends("backend/b_layouts/b_layouts")

@section("css_dosyalari")

@endsection

@section("script_dosyalari")
<script src="~/Content/backend/markascripts/js_markaEkle.js"></script>
@endsection

@section("icerik_bilgileri")

<div class="main-body">
    <div class="page-wrapper">

        <div class="page-header card">
            <div class="card-block">
                <h5 class="m-b-10">Marka Tablosu</h5>
                <p class="text-muted m-b-10">Kayıtlı olan Markalarınız ile ilgili bilgilere buradan ulaşabilirsiniz.</p>
                <ul class="breadcrumb-title b-t-default p-t-10">
                    <li class="breadcrumb-item">
                        <a href="index.html"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#!">E-Ticaret</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#!">Marka Raporu</a>
                    </li>
                </ul>
            </div>
        </div>


        <div class="page-body">
            <div class="row">
                <div class="col-sm-12">

                    <div class="card">
                        <div class="card-header">
                            <h5>Product List</h5>
                            <a href="{{ route('markaekle') }}" id="a_markaekle" class="btn btn-primary waves-effect waves-light f-right d-inline-block md-trigger">Marka Ekle</a>
                        </div>
                        <div class="card-block">
                            <div class="table-responsive">
                                <div class="table-content">
                                    <div class="project-table">
                                        <table id="e-product-list" class="table table-striped dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Resim</th>
                                                    <th>Marka Adı</th>
                                                    <th>Stok Durumu</th>
                                                    <th>İşlem</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @if($markalar != null)
                                     @foreach($markalar as $dt)
                                                    <tr>
                                     @php
                                              if($dt->mresim_id != 0)
                                             {
                                             $resimTblo = DB::table("alf_resimler")->where("aresim_id",$dt->mresim_id)->first();
                                                $resim = asset($resimTblo->yol);
                                             }else{
                                                 $resim = asset("resim-yok.png");
                                             }
                                     @endphp
                                                        <td class="pro-list-img">
                                                            <img src="{{ $resim }}" width="200" height="100"  alt="tbl">
                                                        </td>
                                                        <td class="pro-name">
                                                            <h6>{{ $dt->marka_adi }}</h6>
                                                            <span>{{ substr($dt->marka_aciklama,0,25) }}..</span>
                                                        </td>

                                                        <td>
                                                            <label class="text-success">Stokta</label>
                                                        </td>
                                                        <td class="action-icon">
                                                            <a href="{{route('urunshow')}}/markasec/{{$dt->amarka_id}}" class="btn btn-info  waves-effect waves-light">Ürünler</a>
                                                            <a href="{{route('markaekle')}}/{{$dt->amarka_id}}" class="btn btn-warning  waves-effect waves-light">Düzenle</a>
                                                            <a href="{{route('markasil')}}/{{$dt->amarka_id}}" class="btn btn-danger  waves-effect waves-light">Sil</a>
                                                        </td>
                                                    </tr>
                                                
                                    @endforeach
                                 @else

                                        <tr>
                                            <td> Kullanımda Herhangi bir Marka bulunmamaktadır. </td>
                                        </tr>
                                            @endif                        
                                          
                                                
                                                                                

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


            <div class="md-overlay"></div>
            <div>
                 <center>{{$markalar->links()}}</center>
             </div>

        </div>

    </div>
</div>

@endsection