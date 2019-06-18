<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Mouldifi - A fully responsive, HTML5 based admin theme">
    <meta name="keywords" content="Responsive, HTML5, admin theme, business, professional, Mouldifi, web design, CSS3">
    <title>Mouldifi | Login</title>
    <!-- Site favicon -->
    <link rel='shortcut icon' type='image/x-icon' href='{{ asset('dashboard_files/images/favicon.ico') }}'/>
    <!-- /site favicon -->

    <!-- Entypo font stylesheet -->
    <link href="{{ asset('dashboard_files/css/entypo.css') }}" rel="stylesheet">

    <!-- Font awesome stylesheet -->
    <link href="{{ asset('dashboard_files/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- Bootstrap stylesheet min version -->
    <link href="{{ asset('dashboard_files/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Mouldifi core stylesheet -->
    <link href="{{ asset('dashboard_files/css/mouldifi-core.css') }}" rel="stylesheet">

    <link href="{{ asset('dashboard_files/css/mouldifi-forms.css') }}" rel="stylesheet">

    @if (app()->getLocale() == 'ar')

        {{--bootstrap rtl--}}
        <link href="{{ asset('dashboard_files/css/bootstrap-rtl.min.css') }}" rel="stylesheet">
        <link href="{{ asset('dashboard_files/css/mouldifi-rtl-core.css') }}" rel="stylesheet">

        {{--cairo font--}}
        <link href="https://fonts.googleapis.com/css?family=Cairo:400,700" rel="stylesheet">

        <style>
            body, h1, h2, h3, h4, h5, h6 {
                font-family: 'Cairo', sans-serif !important;
            }

            .form-control {
                padding: 0 12px;
            }
        </style>

    @endif

    {{--icheck--}}
    <link rel="stylesheet" href="{{ asset('dashboard_files/css/plugins/icheck/square/blue.css') }}">

    <script src="{{ asset('dashboard_files/js/html5shiv.min.js') }}"></script>
    <script src="{{ asset('dashboard_files/js/respond.min.js') }}"></script>

</head>
<body class="login-page">
<div class="login-container">
    <div class="login-branding">
        <a href="{{ route('dashboard.welcome') }}"><img src="{{ asset('dashboard_files/images/logo.png') }}" alt="Mouldifi" title="Mouldifi"></a>
    </div>
    <div class="login-content">
        <h2><strong>@lang('site.login')</strong></h2>
        <form method="post" action="{{ route('login') }}">

            @include('dashboard.partials._errors')

            {{ csrf_field() }}

            <div class="form-group">
                <input type="text" placeholder="@lang('site.email')" name="email" class="form-control">
            </div>

            <div class="form-group">
                <input type="password" placeholder="@lang('site.password')" name="password" class="form-control">
            </div>
            <div class="form-group">

                <label style="font-weight: normal;">
                    <input type="checkbox" name="remember">
                    @lang('site.remember_me')
                </label>

            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block">@lang('site.login')</button>
            </div>
            <p class="text-center"><a href="{{ route('password.request') }}">@lang('site.forget_password')</a></p>
        </form>
    </div>
</div>
<!--Load JQuery-->
<script src="{{ asset('dashboard_files/js/jquery.min.js') }}"></script>
<script src="{{ asset('dashboard_files/js/bootstrap.min.js') }}"></script>

{{--icheck--}}
<script src="{{ asset('dashboard_files/js/plugins/ickeck/icheck.min.js') }}"></script>

<script>
    $(document).ready(function () {

        //icheck
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',

        });

    });//end of document ready

</script>
</body>
</html>
