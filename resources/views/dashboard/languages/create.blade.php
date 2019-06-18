@extends('layouts.dashboard.app')

@section('content')

    <h1 class="page-title">@lang('site.languages')</h1>

    {{--breadcrumb--}}
    <ol class="breadcrumb breadcrumb-2">
        <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-home"></i>@lang('site.welcome')</a></li>
        <li><a href="{{ route('dashboard.languages.index') }}">@lang('site.languages')</a></li>
        <li class="active"><strong>@lang('site.add')</strong></li>
    </ol>

    <div class="row">

        <div class="col-md-12">

            <div class="panel panel-default">

                <div class="panel-body">

                    @include('dashboard.partials._errors')

                    <form action="{{ route('dashboard.languages.store') }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('post') }}

                        {{--name--}}
                        <div class="form-group">
                            <label>@lang('site.name')</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                        </div>

                        {{--code--}}
                        <div class="form-group">
                            <label>@lang('site.code')</label>
                            <input type="text" name="code" class="form-control" value="{{ old('code') }}">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of panel body -->

            </div><!-- end of panel default -->

        </div><!-- end of col -->

    </div><!-- end of row -->
@endsection
