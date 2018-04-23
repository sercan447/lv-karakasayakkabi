@extends("backend/b_layouts/b_layouts")

@section("css_dosyalari")

@endsection

@section("script_dosyalari")

@endsection

@section("icerik_bilgileri")

<h2> İşletme Bilgileri</h2>
<form id="formMarka" name="formMarka" action="{{ URL('/admin/isletmebilgi') }}" method="post" enctype="multipart/form-data" >
        
        {{ csrf_field() }}
        <input type="hidden" name="guncelleme_id" value="{{$isletmebilgi->numara}}" />
    <div class="page-body">

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">İşletme Adı </label>
            <div class="col-sm-10">
                <input type="text" name="adi" id="adi" class="form-control" value="{{$isletmebilgi->adi}}" required placeholder="İşletme Adı Giriniz. (Zorunlu)">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Adres</label>
            <div class="col-sm-10">
                <textarea rows="5" cols="5" name="adres" id="adres" class="form-control"  placeholder="İşletme Adresi giriniz.(Zorunlu)">
                        {{trim($isletmebilgi->adres)}}
                </textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Açıklama</label>
            <div class="col-sm-10">
                <textarea rows="5" cols="5" name="aciklama" id="aciklama" class="form-control" placeholder="İşletme ilgili Açıklaması (Zorunlu)">
                        {{$isletmebilgi->aciklama}}
                </textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">E-Posta</label>
            <div class="col-sm-10">
            <input type="text" name="eposta1" id="eposta1" class="form-control" value="{{$isletmebilgi->eposta1}}" placeholder="E-Posta giriniz.(Zorunlu)"/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">E-Posta -2</label>
            <div class="col-sm-10">
            <input type="text" name="eposta2" id="eposta2" class="form-control" value="{{$isletmebilgi->eposta2}}" placeholder="E-Posta giriniz.(İsteğe Bağlı)"/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Telefon -1</label>
            <div class="col-sm-10">
            <input type="text" name="telefon1" id="telefon1" class="form-control" value="{{$isletmebilgi->telefon1}}" placeholder="Telefon Numarası giriniz.(Zorunlu)"/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Telefon -2</label>
            <div class="col-sm-10">
                <input type="text" name="telefon2" id="telefon2" class="form-control" value="{{$isletmebilgi->telefon2}}" placeholder="Telefon Numarası giriniz.(İsteğe Bağlı)"/>
            </div>
        </div>

    @if($isletmebilgi->resimid != 0)
    @php
    $resim = DB::table("alf_resimler")->where("aresim_id",$isletmebilgi->resimid)->first();
    @endphp
        <img  src="{{asset(''.$resim->yol)}}" width="350px" height="350px"/>
     @else
     <img src="{{asset('resim-yok.png')}}" width="250px" height="150px"/> 
     @endif   
        <div class="card">
            <div class="card-header">
                <h5>Resim Seç</h5>
            </div>
            <div class="card-block">
                <div class="sub-title">,İşletmeye dair logo vb. resim türlerinden birini seçiniz.</div>
                <input type="file" name="isletme_resmi" id="isletme_resmi" multiple="multiple" data-resimadi="">
            </div>
        </div>
        <div class="form-group row">

            <div class="col-sm-10">
                <input type="submit"  id="btn_kaydet" class="btn btn-success" value="Kaydet"></input>
                <input type="reset" class="btn btn-warning" value="Temizle"></input>
            </div>
        </div>


    </div>
</form>

@endsection