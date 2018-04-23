@extends("backend/b_layouts/b_layouts")

@section("css_dosyalari")

@endsection

@section("script_dosyalari")
<script type="text/javascript">

$(document).ready(function () {

    $("#btn_kaydet").click(function () {
        
    });
    
});
</script>

@endsection

@section("icerik_bilgileri")

<h2>Özellik Tipi Ekle</h2>

<form id="formKategori" name="formKategori" action="{{ route('ozelliktipekle') }}" method="post">
                    {{ csrf_field() }}
    <div class="page-body">

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Özellik Adı </label>
            <div class="col-sm-10">
                <input type="text" name="adi" id="adi" class="form-control" placeholder="Özellik Adı Giriniz" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Açıklama</label>
            <div class="col-sm-10">
                <textarea rows="5" cols="5" name="aciklama" id="aciklama" class="form-control" placeholder="Özellik Açıklaması"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Kategori Seç</label>
            <div class="col-sm-10">
                <select name="anakategorid" id="anakategorid" class="form-control form-control-default" required>
                    <option value="opt1">Kategori Seçiniz </option>
                  @if($anakategoriler != null)
                  @foreach($anakategoriler as $kategori)
                    <option value="{{$kategori->akategori_id}}">{{ $kategori->kategori_adi }} </option>
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



