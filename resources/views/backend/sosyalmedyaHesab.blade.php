@extends("backend/b_layouts/b_layouts")

@section("css_dosyalari")

@endsection

@section("script_dosyalari")

@endsection

@section("icerik_bilgileri")

    <h2>Sosyal Paylaşım Hesapları</h2>
<!--
<a href="#fakelink" class="btn btn-facebook"><i class="fa fa-facebook"></i></a>
<a href="#fakelink" class="btn btn-twitter"><i class="fa fa-twitter"></i></a>
<a href="#fakelink" class="btn btn-linkedin"><i class="fa fa-linkedin"></i></a>
<a href="#fakelink" class="btn btn-google-plus"><i class="fa fa-google-plus"></i></a>
<a href="#fakelink" class="btn btn-instagram"><i class="fa fa-instagram"></i></a>
<a href="#fakelink" class="btn btn-pinterest"><i class="fa fa-pinterest"></i></a>
<a href="#fakelink" class="btn btn-dropbox"><i class="fa fa-vk"></i></a>
<a href="#fakelink" class="btn btn-tumblr"><i class="fa fa-tumblr"></i></a>

            
<button class="btn btn-primary btn-icon"><i class="icofont icofont-user-alt-3"></i></button>
<button class="btn btn-success btn-icon"><i class="icofont icofont-check-circled"></i></button>
<button class="btn btn-info btn-icon"><i class="icofont icofont-info-square"></i></button>
<button class="btn btn-warning btn-icon"><i class="icofont icofont-warning-alt"></i></button>
<button class="btn btn-danger btn-icon"><i class="icofont icofont-eye-alt"></i></button>
<button class="btn btn-inverse btn-icon"><i class="icofont icofont-exchange"></i></button>
<button class="btn btn-disabled btn-icon disabled"><i class="icofont icofont-not-allowed"></i></button>
-->

<form id="formUrun" name="formUrun" action="{{ route('sosyalmedyahesab') }}" method="post">
         {{ csrf_field() }}
   <div class="page-body">

    <input type="hidden" name="guncelleme_id" value="{{$sosyalmedya->numara}}" />

            <table>
            <tr>
            <td><a href="{{$sosyalmedya->twitter}}" class="btn btn-twitter"><i class="fa fa-twitter"></i></a> <td>
            <td width="500px"> <input type="text" name="twitter" id="twitter"  value="{{$sosyalmedya->twitter}}" class="form-control form-control-warning" placeholder="Twitter hesabınızı giriniz."> </td>
            </tr>
            
            <tr>
            <td><a href="{{$sosyalmedya->facebook}}" class="btn btn-facebook"><i class="fa fa-facebook"></i></a><td>
            <td width="500px"> <input type="text" name="facebook" id="facebook"  value="{{$sosyalmedya->facebook}}" class="form-control form-control-warning" placeholder="Facebook hesabınızı giriniz."> </td>
            </tr>

            <tr>
            <td><a href="{{$sosyalmedya->linkedin}}" class="btn btn-linkedin"><i class="fa fa-linkedin"></i></a><td>
            <td width="500px"> <input type="text" name="linkedin" id="linkedin" value="{{$sosyalmedya->linkedin}}" class="form-control form-control-warning" placeholder="linkedin hesabınızı giriniz."> </td>
            </tr>

            
            <tr>
            <td><a href="{{$sosyalmedya->googleplus}}" class="btn btn-google-plus"><i class="fa fa-google-plus"></i></a><td>
            <td width="500px"> <input type="text" name="googleplus" id="googleplus"  value="{{$sosyalmedya->googleplus}}" class="form-control form-control-warning" placeholder="Google plus hesabınızı giriniz."> </td>
            </tr>

            <tr>
            <td><a href="{{$sosyalmedya->instagram}}" class="btn btn-instagram"><i class="fa fa-instagram"></i></a><td>
            <td width="500px"> <input type="text" name="instagram" id="instagram" value="{{$sosyalmedya->instagram}}" class="form-control form-control-warning" placeholder="Instagram hesabınızı giriniz."> </td>
            </tr>


            <tr>
            <td><a href="{{$sosyalmedya->pinterest}}" class="btn btn-pinterest"><i class="fa fa-pinterest"></i></a><td>
            <td width="500px"> <input type="text" name="pinterest" id="pinterest"  value="{{$sosyalmedya->pinterest}}" class="form-control form-control-warning" placeholder="Pinterest hesabınızı Giriniz"> </td>
            </tr>

            <tr>
                <td colspan="3">  </td>
                <td><button class="btn btn-out-dashed btn-warning btn-square">Hesapları Kaydet</button></td>
            </tr>

            </table>   
     </div>
        </form>
@endsection