<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from html.codedthemes.com/gradient-able/light-dark/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 15 Jan 2018 16:39:11 GMT -->
<head>
<title>Alfa Toptancılık Yönetim Sistemi </title>


<!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="description" content="Gradient Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
<meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
<meta name="author" content="codedthemes" />

<link rel="icon" href="http://html.codedthemes.com/gradient-able/files/assets/images/favicon.ico" type="image/x-icon">
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('/backend/bower_components/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/backend/assets/icon/themify-icons/themify-icons.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/backend/assets/icon/font-awesome/css/font-awesome.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/backend/assets/css/jquery.mCustomScrollbar.css') }}">
<link rel="stylesheet" href="{{ asset('/backend/assets/pages/chart/radial/css/radial.css') }}" type="text/css" media="all">
<link rel="stylesheet" type="text/css" href="{{ asset('/backend/assets/css/style.css') }}">

<link rel="stylesheet" href="{{asset('backend/assets/bootstrap-summernote/summernote.css')}}">
<link rel="stylesheet" href="{{asset('backend/assets/bootstrap-summernote/summernote-bs3.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('backend/bower_components/pnotify/css/pnotify.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('backend/bower_components/pnotify/css/pnotify.brighttheme.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('backend/bower_components/pnotify/css/pnotify.buttons.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('backend/bower_components/pnotify/css/pnotify.history.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('backend/bower_components/pnotify/css/pnotify.mobile.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/pages/pnotify/notify.css') }}">

<link href="{{ asset('css/sweetalert2.min.css')}}" />
@yield("css_dosyalari")
</head>
<body>

<div class="theme-loader">
<div class="loader-track">
<div class="loader-bar"></div>
</div>
</div>

<div id="pcoded" class="pcoded">
<div class="pcoded-overlay-box"></div>
<div class="pcoded-container navbar-wrapper">
<nav class="navbar header-navbar pcoded-header">
<div class="navbar-wrapper">
<div class="navbar-logo">
<a class="mobile-menu" id="mobile-collapse" href="#!">
<i class="ti-menu"></i>
</a>
<div class="mobile-search">
<div class="header-search">
<div class="main-search morphsearch-search">
<div class="input-group">
<span class="input-group-addon search-close"><i class="ti-close"></i></span>
<input type="text" class="form-control" placeholder="Enter Keyword">
<span class="input-group-addon search-btn"><i class="ti-search"></i></span>
</div>
</div>
</div>
</div>
<a href="index.html">
<img class="img-fluid" src="" alt="Alfa Toptancılık Sistemi" />
</a>
<a class="mobile-options">
<i class="ti-more"></i>
</a>
</div>
<div class="navbar-container container-fluid">
<ul class="nav-left">
<li>
<div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
</li>
<li class="header-search">
<div class="main-search morphsearch-search">
<div class="input-group">
<span class="input-group-addon search-close"><i class="ti-close"></i></span>
<input type="text" class="form-control">
<span class="input-group-addon search-btn"><i class="ti-search"></i></span>
</div>
</div>
</li>
<li>
<a href="#!" onclick="javascript:toggleFullScreen()">
<i class="ti-fullscreen"></i>
</a>
</li>
</ul>
<ul class="nav-right">
<li class="header-notification">
<a href="#!">
<i class="ti-bell"></i>
<span class="badge bg-c-pink"></span>
</a>
<ul class="show-notification">
<li>
<h6>Notifications</h6>
<label class="label label-danger">New</label>
</li>
<li>
<div class="media">
<img class="d-flex align-self-center img-radius" src="{{ asset('/backend/assets/images/avatar-2.jpg') }}" alt="Generic placeholder image">
<div class="media-body">
<h5 class="notification-user">John Doe</h5>
<p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
<span class="notification-time">30 minutes ago</span>
</div>
</div>
</li>
</ul>
</li>
<li class="">
<a href="#!" class="displayChatbox">
<i class="ti-comments"></i>
<span class="badge bg-c-green"></span>
</a>
</li>
<li class="user-profile header-notification">
<a href="#!">
<img src="{{ asset('/backend/man.png') }}" class="img-radius" alt="User-Profile-Image">
<span>{{Auth::user()->name}}</span>
<i class="ti-angle-down"></i>
</a>
 <ul class="show-notification profile-notification">
                                <!--
                                    <li>
                                        <a href="#!">
                                            <i class="typei-settings"></i> Ayarlar
                                        </a>
                                    </li>
                                    -->
                                    <li>
                                        <a href="user-profile.html">
                                            <i class="ti-user"></i> Profilim
                                        </a>
                                    </li>
                                    <li>
                                        <a href="email-inbox.html">
                                            <i class="ti-email"></i> Mesajlarım
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('adminlogin') }}">
                                            <i class="ti-lock"></i> Paneli Kilitle
                                        </a>
                                    </li>
                                    <li>      
                                 <a  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <i class="ti-layout-sidebar-left"></i>   Çıkış
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                       
                                    </li>
                                </ul>
</li>
</ul>
</div>
</div>
</nav>

<div id="sidebar" class="users p-chat-user showChat">
<div class="had-container">
<div class="card card_main p-fixed users-main">
<div class="user-box">
<div class="chat-search-box">
<a class="back_friendlist">
<i class="fa fa-chevron-left"></i>
</a>
<div class="right-icon-control">
<input type="text" class="form-control  search-text" placeholder="Online Kişi ara" id="search-friends">
<div class="form-icon">
<i class="fa fa-search"></i>
</div>
</div>
</div>
<div class="main-friend-list">

<!-- KISI ONLINE -->
<div class="media userlist-box" >
<a class="media-left" href="#">
<!--<img class="media-object img-radius img-radius" src="{{ asset('/backend/man.png') }}"> -->
<div class="live-status bg-success"></div>
</a>
<div class="media-body">
<!-- LOGIN OLACAKLARI BURADA GOSTER -->
<div class="f-13 chat-header" id="user_login_status">

</div>
</div>
</div>
<!-- KISI ONELINE END -->




</div>
</div>
</div>
</div>
</div>

<div class="showChat_inner">
<div class="media chat-inner-header">
<a class="back_chatBox">
<i class="fa fa-chevron-left"></i> Josephin Doe
</a>
</div>
<div class="media chat-messages">
<a class="media-left photo-table" href="#!">
<img class="media-object img-radius img-radius m-t-5" src="{{ asset('/backend/assets/images/avatar-3.jpg') }}" alt="Generic placeholder image">
</a>
<div class="media-body chat-menu-content">
<div class="">
<p class="chat-cont">I'm just looking around. Will you tell me something about yourself?</p>
<p class="chat-time">8:20 a.m.</p>
</div>
</div>
</div>
<div class="media chat-messages">
<div class="media-body chat-menu-reply">
<div class="">
<p class="chat-cont">I'm just looking around. Will you tell me something about yourself?</p>
<p class="chat-time">8:20 a.m.</p>
</div>
</div>
<div class="media-right photo-table">
<a href="#!">
 <img class="media-object img-radius img-radius m-t-5" src="{{ asset('/backend/assets/images/avatar-4.jpg') }}" alt="Generic placeholder image">
</a>
</div>
</div>
<div class="chat-reply-box p-b-20">
<div class="right-icon-control">
<input type="text" class="form-control search-text" placeholder="Share Your Thoughts">
<div class="form-icon">
<i class="fa fa-paper-plane"></i>
</div>
</div>
</div>
</div>

<div class="pcoded-main-container">
<div class="pcoded-wrapper">
<nav class="pcoded-navbar">
<div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
<div class="pcoded-inner-navbar main-menu">

<div class="pcoded-navigation-label">Modüller</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="ti-home"></i><b></b></span>
                                        <span class="pcoded-mtext">İşlemler</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="">
                                            <a href="{{ URL('/admin/anasayfa') }}">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Anasayfa</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="ti-gift"></i><b>D</b></span>
                                        <span class="pcoded-mtext">Özellikler</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="">
                                            <a href="/Ozellik/OzellikTipleri">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Özellik Tipleri</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="{{route('ozelliktipekle')}}">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Özellik Tipi Ekle</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="#">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Özellik Değerleri</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="{{route('ozellikdegerekle')}}">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Özellik Değeri Ekle</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="/Ozellik/OzellikEkle">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Özellik Ekle</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="/Ozellik/Ozellikler">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Özellikler</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>

                                    </ul>
                                </li>
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="ti-layers-alt"></i><b>D</b></span>
                                        <span class="pcoded-mtext">Markalar</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="">
                                            <a href="{{ URL('/admin/markaekle') }}">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Marka Ekle</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="{{ route('markashow') }}">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Marka Raporlama</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>

                                    </ul>
                                </li>
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                        <span class="pcoded-mtext">Ürünler</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="">
                                            <a href="{{ route('urunekle') }}">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Ürün Ekle</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="{{ URL('/admin/urunshow') }}">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Ürün Raporlama</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>

                                    </ul>
                                </li>
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="ti-direction-alt"></i><b>D</b></span>
                                        <span class="pcoded-mtext">Kategoriler</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="">
                                            <a href="{{ route('kategoriekle') }}">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Kategori Ekle</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="{{  URL('/admin/kategorishow') }}">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Kategori Raporlama</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>

                                    </ul>
                                </li>
                               
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                        <span class="pcoded-mtext">Alışverişler</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="">
                                            <a href="/Kategoriler/KategoriCreate">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Tamamlanan Siparişler</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="/Kategoriler/KategoriShow">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Onay Beyleyen Siparişler</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="/Kategoriler/KategoriShow">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Kargoya Verilen Siparişler</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>

                                    </ul>
                                </li>
                                <li class="">
                                            <a href="{{route('sosyalmedyahesab')}}">
                                                <span class="pcoded-micon"><i class="ti-dribbble"></i></span>
                                                <span class="pcoded-mtext">Sosyal Medya</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                </li>
                                <li class="">
                                            <a href="{{route('isletmebilgi')}}">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Şirket Bilgileri</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                </li>
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="ti-user"></i><b>D</b></span>
                                        <span class="pcoded-mtext">Hesaplar</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                    <li class="">
                                            <a href="{{URL('register')}}">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Admin Hesap Tanımla</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                  </li>
                                  <li class="">
                                            <a href="{{route('tanimlihesaplar')}}">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Tanımlı Hesaplar</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                  </li>
                                  <li class="">
                                            <a href="{{route('uyeler')}}">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Üyeler</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                  </li>
                                    </ul>
                                </li>
                               
                            </ul>



</div>
</nav>
<div class="pcoded-content">
<div class="pcoded-inner-content">

<div class="main-body">
<div class="page-wrapper">


@yield("icerik_bilgileri")

</div>
</div>
</div>
</div>



<script src="{{ asset('/backend/bower_components/jquery/js/jquery.min.js') }}"></script>
<script src="{{ asset('/backend/bower_components/jquery-ui/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('/backend/bower_components/popper.js/js/popper.min.js') }}"></script>
<script src="{{ asset('/backend/bower_components/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/backend/assets/pages/widget/excanvas.js') }}"></script>
<script src="{{ asset('/backend/bower_components/jquery-slimscroll/js/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('/backend/bower_components/modernizr/js/modernizr.js') }}"></script>
<script src="{{ asset('/backend/assets/js/SmoothScroll.js') }}"></script>
<script src="{{ asset('/backend/assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script src="{{ asset('/backend/bower_components/chart.js/js/Chart.js') }}"></script>
<script src="{{ asset('/backend/assets/pages/widget/amchart/amcharts.js') }}"></script>
<script src="{{ asset('/backend/assets/pages/widget/amchart/serial.js') }}"></script>
<script src="{{ asset('/backend/assets/pages/widget/amchart/light.js') }}"></script>
<script src="{{ asset('/backend/assets/js/pcoded.min.js') }}"></script>
<script src="{{ asset('/backend/assets/js/light-dark/vertical-layout.min.js') }}"></script>
<script src="{{ asset('/backend/assets/pages/dashboard/custom-dashboard.js') }}"></script>
<script src="{{ asset('/backend/assets/js/script.js') }}"></script>

<script src="{{asset('backend/assets/bootstrap-summernote/summernote.min.js') }}"></script>
<script src="{{ asset('backend/bower_components/pnotify/js/pnotify.js') }}"></script>
<script src="{{ asset('backend/bower_components/pnotify/js/pnotify.desktop.js') }}"></script>
<script src="{{ asset('backend/bower_components/pnotify/js/pnotify.buttons.js') }}"></script>
<script src="{{ asset('backend/bower_components/pnotify/js/pnotify.confirm.js') }}"></script>
<script src="{{ asset('backend/bower_components/pnotify/js/pnotify.callbacks.js') }}"></script>
<script src="{{ asset('backend/bower_components/pnotify/js/pnotify.animate.js') }}"></script>
<script src="{{ asset('backend/bower_components/pnotify/js/pnotify.history.js') }}"></script>
<script src="{{ asset('backend/bower_components/pnotify/js/pnotify.mobile.js') }}"></script>
<script src="{{ asset('backend/bower_components/pnotify/js/pnotify.nonblock.js') }}"></script>
<script src="{{ asset('backend/assets/pages/pnotify/notify.js') }}"></script>

<script	src="{{ asset('js/jquery.form.min.js') }}" ></script>
<script src="{{ asset('js/jquery.validate.min.js') }}" ></script>
<script src="{{ asset('js/messages_tr.js') }}" ></script>
<script src="{{ asset('js/sweetalert2.all.min.js')}}" ></script>


@yield("script_dosyalari")
<script>
                                $(document).ready(function(){
												
                                               function update_user_activity()
                                                {
                                                    $.ajax({
                                                        type:"GET",
                                                        url:"{{route('aksiyon')}}",
                                                        data:{"aksiyon":"guncelle"},
                                                        success:function(basarili){
                                                    
                                                                //alert(basarili);
                                                        },
                                                        error:function(hatali){
                                                           // alert("GUNCELLEME HATASI : "+hatali);
                                                    }
                                                    });//AJAX EKLEME
                                                
                                                }//functıon END
                                                
                                                setInterval(function(){ 
                                                 update_user_activity();
                                                }, 3000);
                                                
                                                fetch_user_login_data();
                                                    
                                                setInterval(function(){
                                                 fetch_user_login_data();
                                                }, 3000);
                                                    
                                                function fetch_user_login_data()
                                                {	
                                                    $.ajax({
                                                        type:"GET",
                                                        url:"{{route('aksiyon')}}",
                                                        data:{"aksiyon":"goster"},
                                                        success:function(basarili){
                                                                //    alert(basarili);
                                                            $('#user_login_status').html(basarili);
                                                        },
                                                        error:function(hatali){
                                                           // alert("GOSTERME HATASI : "+hatali);		
                                                    }
                                                    });//AJAX EKLEME
                                                }//FUNCTION
                                                
                                                
                                                });//document.ready
                                                </script>
</body>

<!-- Mirrored from html.codedthemes.com/gradient-able/light-dark/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 15 Jan 2018 16:40:57 GMT -->
</html>
