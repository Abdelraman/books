<div class="page-sidebar">

    {{--site header--}}
    <header class="site-header">
        <div class="site-logo"><a href="index.html"><img src="{{ asset('dashboard_files/images/logo.png') }}" alt="Mouldifi" title="Mouldifi"></a></div>
        <div class="sidebar-collapse hidden-xs"><a class="sidebar-collapse-icon" href="#"><i class="icon-menu"></i></a></div>
        <div class="sidebar-mobile-menu visible-xs"><a data-target="#side-nav" data-toggle="collapse" class="mobile-menu-icon" href="#"><i class="icon-menu"></i></a></div>
    </header>

    {{--main navigation--}}
    <ul id="side-nav" class="main-menu navbar-collapse collapse">

        <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-magnet"></i><span class="title">@lang('site.welcome')</span></a></li>

        {{--books--}}
        @if (auth()->user()->hasPermission('read_books'))
            <li><a href="{{ route('dashboard.books.index') }}"><i class="fa fa-magnet"></i><span class="title">@lang('site.books')</span></a></li>
        @endif

        {{--languages--}}
        @if (auth()->user()->hasPermission('read_languages'))
            <li><a href="{{ route('dashboard.languages.index') }}"><i class="fa fa-magnet"></i><span class="title">@lang('site.languages')</span></a></li>
        @endif

        {{--translators--}}
        @if (auth()->user()->hasPermission('read_translators'))
            <li><a href="{{ route('dashboard.translators.index') }}"><i class="fa fa-magnet"></i><span class="title">@lang('site.translators')</span></a></li>
        @endif

        {{--<li class="has-sub"><a href="index.html"><i class="icon-gauge"></i><span class="title">Dashboard</span></a>--}}
            {{--<ul class="nav collapse">--}}
                {{--<li><a href="index.html"><span class="title">Misc.</span></a></li>--}}
                {{--<li><a href="ecommerce-dashboard.html"><span class="title">E-Commerce</span></a></li>--}}
                {{--<li><a href="news-dashboard.html"><span class="title">News Portal</span></a></li>--}}
            {{--</ul>--}}
        {{--</li>--}}
       
    </ul><!-- end of main menu -->

</div><!-- end of page side bar -->
