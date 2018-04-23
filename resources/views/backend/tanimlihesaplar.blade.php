@extends("backend/b_layouts/b_layouts")

@section("css_dosyalari")
<link rel="stylesheet" type="text/css" href="{{ asset('backend/bower_components/switchery/css/switchery.min.css') }}">
@endsection

@section("script_dosyalari")
<script src="{{ asset('backend/bower_components/switchery/js/switchery.min.js') }}"></script>
<script src="{{ asset('backend/assets/pages/advance-elements/swithces.js') }}"></script>

@endsection

@section("icerik_bilgileri")


<div class="page-body">

<div class="card">
<div class="card-header">
<h5>Panele girebilecek yetkili kişiler</h5>
<span>Tanımlanmış Admin Hesapları</span>
</div>
<div class="card-block table-border-style">
<div class="table-responsive">
<table class="table">
<thead>
<tr>
<th>#</th>
<th>isim</th>
<th>E-Posta</th>
<th>Durumu</th>
</tr>
</thead>
<tbody>
@if($adminler != null)
    @foreach($adminler as $admin)
    <tr>
    <th scope="row">1</th>
    <td>{{$admin->name}}</td>
    <td>{{$admin->email}}</td>
    <td>{{$admin->hesap_durum}}</td>
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