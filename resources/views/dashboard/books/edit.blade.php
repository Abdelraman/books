@extends('layouts.dashboard.app')

@section('content')

    <h1 class="page-title">@lang('site.books')</h1>

    {{--breadcrumb--}}
    <ol class="breadcrumb breadcrumb-2">
        <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-home"></i>@lang('site.welcome')</a></li>
        <li><a href="{{ route('dashboard.books.index') }}">@lang('site.books')</a></li>
        <li class="active"><strong>@lang('site.edit')</strong></li>
    </ol>

    <div class="row">

        <div class="col-md-12">

            <div class="panel panel-default">

                <div class="panel-body">

                    <form action="{{ route('dashboard.books.update', $book->id) }}" method="post">

                        {{ csrf_field() }}
                        {{ method_field('put') }}

                        @include('dashboard.partials._errors')

                        {{--name--}}
                        <div class="form-group">
                            <label>@lang('site.name')</label>
                            <input type="text" name="name" class="form-control" value="{{ $book->name }}">
                        </div>

                        {{--folder name--}}
                        <div class="form-group">
                            <label>@lang('site.folder_name')</label>
                            <input type="text" name="folder_name" class="form-control" value="{{ $book->folder_name }}">
                        </div>

                        {{--number of pages--}}
                        <div class="form-group">
                            <label>@lang('site.number_of_pages')</label>
                            <input type="text" name="number_of_pages" class="form-control" value="{{ $book->number_of_pages }}">
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> @lang('site.edit')</button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of panel body -->

            </div><!-- end of panel default -->

        </div><!-- end of col -->

    </div><!-- end of row -->
@endsection
