<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Mouldifi - A fully responsive, HTML5 based admin theme">
    <meta name="keywords" content="Responsive, HTML5, admin theme, business, professional, Mouldifi, web design, CSS3">
    <title>Mouldifi | Basic Forms</title>

    {{--favicon--}}
    <link rel='shortcut icon' type='image/x-icon' href='{{ asset('dashboard_files/images/favicon.ico') }}'/>

    {{--enotype font--}}
    <link href="{{ asset('dashboard_files/css/entypo.css') }}" rel="stylesheet">

    {{--font awesome--}}
    <link href="{{ asset('dashboard_files/css/font-awesome.min.css') }}" rel="stylesheet">

    {{--bootstrap--}}
    <link href="{{ asset('dashboard_files/css/bootstrap.min.css') }}" rel="stylesheet">

    {{-- mouldifi --}}
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

    {{--noty--}}
    <link rel="stylesheet" href="{{ asset('dashboard_files/css/plugins/noty/noty.css') }}">
    <script src="{{ asset('dashboard_files/js/plugins/noty/noty.min.js') }}"></script>

    {{--icheck--}}
    <link rel="stylesheet" href="{{ asset('dashboard_files/css/plugins/icheck/square/blue.css') }}">

    {{--select 2--}}
    <link rel="stylesheet" href="{{ asset('dashboard_files/css/plugins/select2/select2.css') }}">
    
    <style>
        .mr-2 {
            margin-right: 5px;
        }
    </style>
    {{-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries --}}
    <script src="{{ asset('dashboard_files/js/html5shiv.min.js') }}"></script>
    <script src="{{ asset('dashboard_files/js/respond.min.js') }}"></script>

</head>
<body>

<div class="page-container">

    @include('layouts.dashboard._aside')

    {{--main container--}}
    <div class="main-container">

        {{-- main header --}}
        <div class="main-header row">

            <div class="col-sm-6 col-xs-7">

                <!-- User info -->
                <ul class="user-info pull-left">
                    <li class="profile-info dropdown"><a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false"> <img width="44" class="img-circle avatar" alt="" src="{{ asset('dashboard_files/images/man-3.jpg') }}">{{ auth()->user()->full_name }} <span class="caret"></span></a>

                        <!-- User action menu -->
                        <ul class="dropdown-menu">

                            <li><a href="#/"><i class="icon-user"></i>My profile</a></li>
                            <li><a href="#/"><i class="icon-mail"></i>Messages</a></li>
                            <li><a href="#"><i class="icon-clipboard"></i>Tasks</a></li>
                            <li class="divider"></li>
                            <li><a href="#"><i class="icon-cog"></i>Account settings</a></li>
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="icon-logout"></i>
                                    {{ __('site.logout') }}
                                </a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </ul>
                        <!-- /user action menu -->

                    </li>
                </ul>
                <!-- /user info -->

            </div>

            <div class="col-sm-6 col-xs-5">
                <div class="pull-right">
                    <!-- User alerts -->
                    <ul class="user-info pull-left">

                        <!-- Notifications -->
                        <li class="notifications dropdown">
                            <a data-close-others="true" data-hover="dropdown" data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-attention"></i><span class="badge badge-info">6</span></a>
                            <ul class="dropdown-menu pull-right">
                                <li class="first">
                                    <div class="small"><a class="pull-right danger" href="#">Mark all Read</a> You have <strong>3</strong> new notifications.</div>
                                </li>
                                <li>
                                    <ul class="dropdown-list">
                                        <li class="unread notification-success"><a href="#"><i class="icon-user-add pull-right"></i><span class="block-line strong">New user registered</span><span class="block-line small">30 seconds ago</span></a></li>
                                        <li class="unread notification-secondary"><a href="#"><i class="icon-heart pull-right"></i><span class="block-line strong">Someone special liked this</span><span class="block-line small">60 seconds ago</span></a></li>
                                        <li class="unread notification-primary"><a href="#"><i class="icon-user pull-right"></i><span class="block-line strong">Privacy settings have been changed</span><span class="block-line small">2 hours ago</span></a></li>
                                        <li class="notification-danger"><a href="#"><i class="icon-cancel-circled pull-right"></i><span class="block-line strong">Someone special liked this</span><span class="block-line small">60 seconds ago</span></a></li>
                                        <li class="notification-info"><a href="#"><i class="icon-info pull-right"></i><span class="block-line strong">Someone special liked this</span><span class="block-line small">60 seconds ago</span></a></li>
                                        <li class="notification-warning"><a href="#"><i class="icon-rss pull-right"></i><span class="block-line strong">Someone special liked this</span><span class="block-line small">60 seconds ago</span></a></li>
                                    </ul>
                                </li>
                                <li class="external-last"><a href="#" class="danger">View all notifications</a></li>
                            </ul>
                        </li>
                        <!-- /notifications -->

                        <!-- Messages -->
                        <li class="notifications dropdown">
                            <a data-close-others="true" data-hover="dropdown" data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-mail"></i><span class="badge badge-secondary">12</span></a>
                            <ul class="dropdown-menu pull-right">
                                <li class="first">
                                    <div class="dropdown-content-header"><i class="fa fa-pencil-square-o pull-right"></i> Messages</div>
                                </li>
                                <li>
                                    <ul class="media-list">
                                        <li class="media">
                                            <div class="media-left"><img alt="" class="img-circle img-sm" src="{{ asset('dashboard_files/images/domnic-brown.png') }}"></div>
                                            <div class="media-body">
                                                <a class="media-heading" href="#">
                                                    <span class="text-semibold">Domnic Brown</span>
                                                    <span class="media-annotation pull-right">Tue</span>
                                                </a>
                                                <span class="text-muted">Your product sounds interesting I would love to check this ne...</span>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <div class="media-left"><img alt="" class="img-circle img-sm" src="{{ asset('dashboard_files/images/john-smith.png') }}"></div>
                                            <div class="media-body">
                                                <a class="media-heading" href="#">
                                                    <span class="text-semibold">John Smith</span>
                                                    <span class="media-annotation pull-right">12:30</span>
                                                </a>
                                                <span class="text-muted">Thank you for posting such a wonderful content. The writing was outstanding...</span>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <div class="media-left"><img alt="" class="img-circle img-sm" src="{{ asset('dashboard_files/images/stella-johnson.png') }}"></div>
                                            <div class="media-body">
                                                <a class="media-heading" href="#">
                                                    <span class="text-semibold">Stella Johnson</span>
                                                    <span class="media-annotation pull-right">2 days ago</span>
                                                </a>
                                                <span class="text-muted">Thank you for trusting us to be your source for top quality sporting goods...</span>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <div class="media-left"><img alt="" class="img-circle img-sm" src="{{ asset('dashboard_files/images/alex-dolgove.png') }}"></div>
                                            <div class="media-body">
                                                <a class="media-heading" href="#">
                                                    <span class="text-semibold">Alex Dolgove</span>
                                                    <span class="media-annotation pull-right">10:45</span>
                                                </a>
                                                <span class="text-muted">After our Friday meeting I was thinking about our business relationship and how fortunate...</span>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <div class="media-left"><img alt="" class="img-circle img-sm" src="{{ asset('dashboard_files/images/domnic-brown.png') }}"></div>
                                            <div class="media-body">
                                                <a class="media-heading" href="#">
                                                    <span class="text-semibold">Domnic Brown</span>
                                                    <span class="media-annotation pull-right">4:00</span>
                                                </a>
                                                <span class="text-muted">I would like to take this opportunity to thank you for your cooperation in recently completing...</span>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li class="external-last"><a class="danger" href="#">All Messages</a></li>
                            </ul>
                        </li>
                        <!-- /messages -->

                    </ul>
                    <!-- /user alerts -->

                </div>
            </div>
        </div>

        <div class="main-content" style="min-height: 80%">

            @include('dashboard.partials._session')
            {{--<h1 class="page-title">Basic Form Elements</h1>--}}
            {{--<!-- Breadcrumb -->--}}
            {{--<ol class="breadcrumb breadcrumb-2">--}}
            {{--<li><a href="index.html"><i class="fa fa-home"></i>Home</a></li>--}}
            {{--<li><a href="form-basic.html">Forms</a></li>--}}
            {{--<li class="active"><strong>Basic Form</strong></li>--}}
            {{--</ol>--}}

            @yield('content')

        </div><!-- end of main content -->

        {{--footer--}}
        <footer class="footer-main">

            &copy; 2016 <strong>Mouldifi</strong> Admin Theme by <a target="_blank" href="#/">G-axon</a>

        </footer><!-- end of footer -->

    </div><!-- end of main container -->

</div><!-- end of page container -->

{{-- Load JQuery --}}
<script src="{{ asset('dashboard_files/js/jquery.min.js') }}"></script>
<script src="{{ asset('dashboard_files/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('dashboard_files/js/plugins/metismenu/jquery.metisMenu.js') }}"></script>
<script src="{{ asset('dashboard_files/js/plugins/blockui-master/jquery-ui.js') }}"></script>
<script src="{{ asset('dashboard_files/js/plugins/blockui-master/jquery.blockUI.js') }}"></script>

{{--icheck--}}
<script src="{{ asset('dashboard_files/js/plugins/ickeck/icheck.min.js') }}"></script>

{{--select 2--}}
<script src="{{ asset('dashboard_files/js/plugins/select2/select2.full.min.js') }}"></script>

<script src="{{ asset('dashboard_files/js/functions.js') }}"></script>

<script>
    $(document).ready(function () {

        //delete
        $('.delete').click(function (e) {

            var that = $(this)

            e.preventDefault();

            var n = new Noty({
                text: "@lang('site.confirm_delete')",
                type: "warning",
                killer: true,
                buttons: [
                    Noty.button("@lang('site.yes')", 'btn btn-success mr-2', function () {
                        that.closest('form').submit();
                    }),

                    Noty.button("@lang('site.no')", 'btn btn-primary mr-2', function () {
                        n.close();
                    })
                ]
            });

            n.show();

        });//end of delete

        //icheck
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',

        });

        //select2
        $('.select2').select2({
            width: '300px'
        });

    });

</script>

@stack('scripts')
</body>
</html>
