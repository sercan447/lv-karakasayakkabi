@extends("backend/b_layouts/b_layouts")

@section("css_dosyalari")

@endsection

@section("script_dosyalari")

@endsection

@section("icerik_bilgileri")

<div class="page-body">

<div class="card">
<div class="card-header">
<h5>Kayıtlı Üyeler</h5>
<span>E-Ticaret Sisteminize üye olmuş kullanıcılar</span>
</div>
<div class="card-block table-border-style">
<div class="table-responsive">
<table class="table">
<thead>
<tr>
<th>#</th>
<th>Adı</th>
<td>Soyadı </th>
<th>E-Posta</th>
<th>Şehir</th>
</tr>
</thead>
<tbody>
@if($uyeler != null)
    @foreach($uyeler as $uye)
    <tr>

    <td>{{$uye->adiniz}}</td>
    <td>{{$uye->soyadiniz}}</td>
    <td>{{$uye->eposta}}</td>
    <td>{{$uye->sehir}}</td>
    <td> <input type="checkbox" class="js-warning"  /> </td>
    </tr>
    @endforeach
@endif

</tbody>
</table>
</div>
</div>
</div>
</div>
@endsection