@extends("backend/b_layouts/b_layouts")

@section("css_dosyalari")

@endsection

@section("script_dosyalari")

@endsection

@section("icerik_bilgileri")
<h2>Özellik Değer Ekle</h2>
<form id="formKategori" name="formKategori" action="{{route('ozellikdegerekle') }}" method="post">
    {{csrf_field() }}
<div class="page-body">

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Özellik Değer Adı </label>
        <div class="col-sm-10">
            <input type="text" name="adi" id="adi" class="form-control" placeholder="Özellik Adı Giriniz">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Açıklama</label>
        <div class="col-sm-10">
            <textarea rows="5" cols="5" name="aciklama" id="aciklama" class="form-control" placeholder="Özellik Açıklaması"></textarea>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Tip Seç</label>
        <div class="col-sm-10">
            <select name="ozelliktipid" id="ozelliktipid" class="form-control form-control-default">
                <option value="opt1">Özellik Tip Seçiniz </option>
               @if($ozelliktipleri != null)
                @foreach($ozelliktipleri as $ozeltip)
                    <option value="{{$ozeltip->id}}">{{$ozeltip->ozellik_adi }} </option>
                    @endforeach
                @endif
            </select>
        </div>
    </div>
    <div class="form-group row">

        <div class="col-sm-10">
            <input type="submit" id="btn_kaydet" class="btn btn-success" value="Kaydet"></input>
            <input type="reset" class="btn btn-warning" value="Temizle"></input>
        </div>
    </div>


</div>
</form>

@endsection



