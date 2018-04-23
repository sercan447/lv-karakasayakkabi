<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from html.codedthemes.com/gradient-able/light-dark/auth-sign-up.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 15 Jan 2018 16:47:44 GMT -->
<head>
<title>Gradient Able bootstrap admin template by codedthemes </title>


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

<link rel="stylesheet" type="text/css" href="{{ asset('backend/bower_components/bootstrap/css/bootstrap.min.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/icon/themify-icons/themify-icons.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/icon/icofont/css/icofont.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/style.css') }}">
</head>
<body class="fix-menu">

<div class="theme-loader">
<div class="loader-track">
<div class="loader-bar"></div>
</div>
</div>

<section class="login p-fixed d-flex text-center bg-primary common-img-bg">

<div class="container-fluid">
<div class="row">
<div class="col-sm-12">

<div class="signup-card card-block auth-body mr-auto ml-auto">
<form class="md-float-material" method="POST" action="{{ route('register') }}" >
@csrf
<div class="text-center">
<!-- <img src="../files/assets/images/logo.png" alt="logo.png"> -->
</div>
<div class="auth-box">
<div class="row m-b-20">
<div class="col-md-12">
<h3 class="text-center txt-primary">Kullanıcı Kayıt Hesabı Oluştur</h3>
</div>
</div>
<hr />
<div class="input-group">
<input id="name" type="text" placeholder="Adınız ve Soyadınız" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

@if ($errors->has('name'))
    <span class="invalid-feedback">
        <strong>{{ $errors->first('name') }}</strong>
    </span>
@endif
<span class="md-line"></span>
</div>
<div class="input-group">
<input id="email" type="email" placeholder="E-Posta Adresi" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

@if ($errors->has('email'))
    <span class="invalid-feedback">
        <strong>{{ $errors->first('email') }}</strong>
    </span>
@endif
<span class="md-line"></span>
</div>
<div class="input-group">
<input id="password" type="password" placeholder="Parola" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

@if ($errors->has('password'))
    <span class="invalid-feedback">
        <strong>{{ $errors->first('password') }}</strong>
    </span>
@endif
<span class="md-line"></span>
</div>
<div class="input-group">
<input id="password-confirm" type="password" placeholder="Parola Tekrar" class="form-control" name="password_confirmation" required>

<span class="md-line"></span>
</div>
<div class="row m-t-25 text-left">
<div class="col-md-12">
<div class="checkbox-fade fade-in-primary">

</div>
</div>
<div class="col-md-12">
<div class="checkbox-fade fade-in-primary">

</div>
</div>
</div>
<div class="row m-t-30">
<div class="col-md-12">
<button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Kaydet</button>
</div>
</div>
<hr />
<div class="row">
<div class="col-md-10">
<!--
<p class="text-inverse text-left m-b-0">Thank you and enjoy our website.</p>
<p class="text-inverse text-left"><b>Your Authentication Team</b></p>
-->
</div>
<div class="col-md-2">
<!--<img src="../files/assets/images/auth/Logo-small-bottom.png" alt="small-logo.png"> -->
</div>
</div>
</div>
</form>

</div>

</div>

</div>

</div>

</section>


<!--[if lt IE 10]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="../files/assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="../files/assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="../files/assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="../files/assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="../files/assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->


<script src="{{ asset('backend/bower_components/jquery/js/jquery.min.js') }}"></script>
<script src="{{ asset('backend/bower_components/jquery-ui/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('backend/bower_components/popper.js/js/popper.min.js') }}"></script>
<script src="{{ asset('backend/bower_components/bootstrap/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('backend/bower_components/jquery-slimscroll/js/jquery.slimscroll.js') }}"></script>

<script src="{{ asset('backend/bower_components/modernizr/js/modernizr.js') }}"></script>
<script src="{{ asset('backend/bower_components/modernizr/js/css-scrollbars.js') }}"></script>
<script src="{{ asset('backend/assets/js/common-pages.js') }}"></script>
</body>

<!-- Mirrored from html.codedthemes.com/gradient-able/light-dark/auth-sign-up.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 15 Jan 2018 16:47:44 GMT -->
</html>
