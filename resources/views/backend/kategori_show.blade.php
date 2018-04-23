@extends("backend/b_layouts/b_layouts")

@section("css_dosyalari")

@endsection

@section("script_dosyalari")

@endsection

@section("icerik_bilgileri")


<h2>Kategori Raporlama</h2>

<div class="main-body">
    <div class="page-wrapper">

        <div class="page-header card">
            <div class="card-block">
                <h5 class="m-b-10">Kategoriler Tablosu</h5>
                <p class="text-muted m-b-10">Kayıtlı olan Kategori bilgilere buradan ulaşabilirsiniz.</p>
                <ul class="breadcrumb-title b-t-default p-t-10">
                    <li class="breadcrumb-item">
                        <a href="index.html"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#!">E-Ticaret</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#!">Kategori Raporu</a>
                    </li>
                </ul>
            </div>
        </div>


        <div class="page-body">
            <div class="row">
                <div class="col-sm-12">

                    <div class="card">
                        <div class="card-header">
                            <h5>Kategori Listesi</h5>
                            <a href="{{ route('kategoriekle') }}" id="a_markaekle" class="btn btn-primary waves-effect waves-light f-right d-inline-block md-trigger">Kategori Ekle</a>
                        </div>
                        <div class="card-block">
                            <div class="table-responsive">
                                <div class="table-content">
                                    <div class="project-table">
                                        <table id="e-product-list" class="table table-striped dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Resim</th>
                                                    <th>Kategori Adı</th>
                                                    <th>Stok Durumu</th>
                                                    <th>İşlem</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                               
                                 @if($kategoriler != null)
                                     @foreach($kategoriler as $dt)
                                                    <tr>
                                     @php
                                              if($dt->kresim_id != 0)
                                             {
                                             $resimTblo = DB::table("alf_resimler")->where("aresim_id",$dt->kresim_id)->first();
                                                $resim = asset($resimTblo->yol);
                                             }else{
                                                 $resim = asset("resim-yok.png");
                                             }
                                     @endphp
                                                        <td class="pro-list-img">
                                                            <img src="{{ $resim }}" width="200" height="100"  alt="tbl">
                                                        </td>
                                                        <td class="pro-name">
                                                            <h6>{{ $dt->kategori_adi }}</h6>
                                                            <span>{{ $dt->kategori_aciklama}}</span>
                                                        </td>

                                                        <td>
                                                            <label class="text-success">Stokta</label>
                                                        </td>
                                                        <td class="action-icon">
                                                            <a href="{{route('urunshow')}}/kategorisec/{{$dt->akategori_id}}" class="btn btn-info  waves-effect waves-light " data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">Ürünler</a>
                                                            <a href="{{route('kategoriekle') }}/{{$dt->akategori_id}}" class="btn btn-warning  waves-effect waves-light " data-toggle="tooltip" data-placement="top" title="" data-original-title="Düzenle">Düzenle</a>
                                                            <a href="{{route('kategorisil')}}/{{$dt->akategori_id}}" class="btn btn-danger  waves-effect waves-light">Sil</a>
                                                        </td>
                                                    </tr>
                                                
                                    @endforeach
                                 @else

                                     <tr>
                                        <td> Kullanımda Herhangi bir kategori bulunmamaktadır. </td>
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
                 <center>{{$kategoriler->links()}}</center>
             </div>

        </div>

    </div>
</div>

@endsection