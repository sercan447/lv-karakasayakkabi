<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from html.codedthemes.com/gradient-able/light-dark/auth-reset-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 15 Jan 2018 16:47:47 GMT -->
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

<div class="login-card card-block auth-body mr-auto ml-auto">
                        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
<form class="md-float-material" method="POST" action="{{ route('password.email') }}">
                  {{csrf_field()}}
<div class="text-center">

</div>
<div class="auth-box">
<div class="row m-b-20">
<div class="col-md-12">
<h3 class="text-left">Parola Sıfırla </h3>
</div>
</div>
<p class="text-inverse b-b-default text-right"> <a href="{{route('adminlogin')}}">Giriş Yap.</a></p>
<div class="input-group">
<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
<span class="md-line"></span>
</div>
<div class="row">
<div class="col-md-12">
<button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Parolanızı Resetleyiniz</button>
</div>
</div>
<hr />
<div class="row">
<div class="col-md-10">
<p class="text-inverse text-left m-b-0">Sıfırlama iletiniz E-Posta adresine gelicektir.</p>
<p class="text-inverse text-left"><b></b></p>
</div>
<div class="col-md-2">

</div>
</div>
</div>
</form>

</div>

</div>

</div>

</div>

</section>



<script src="{{ asset('backend/bower_components/jquery/js/jquery.min.js') }}"></script>
<script src="{{ asset('backend/bower_components/jquery-ui/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('backend/bower_components/popper.js/js/popper.min.js') }}"></script>
<script src="{{ asset('backend/bower_components/bootstrap/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('backend/bower_components/jquery-slimscroll/js/jquery.slimscroll.js') }}"></script>

<script src="{{ asset('backend/bower_components/modernizr/js/modernizr.js') }}"></script>
<script src="{{ asset('backend/bower_components/modernizr/js/css-scrollbars.js') }}"></script>
<script src="{{ asset('backend/assets/js/common-pages.js') }}"></script>
</body>

<!-- Mirrored from html.codedthemes.com/gradient-able/light-dark/auth-reset-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 15 Jan 2018 16:47:47 GMT -->
</html>
