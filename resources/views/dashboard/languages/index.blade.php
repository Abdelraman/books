@extends('layouts.dashboard.app')

@section('content')

    <h1 class="page-title">@lang('site.languages')</h1>

    {{--breadcrumb--}}
    <ol class="breadcrumb breadcrumb-2">
        <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-home"></i>@lang('site.welcome')</a></li>
        <li class="active"><strong>@lang('site.languages')</strong></li>
    </ol>


    <div class="row">

        <div class="col-md-12">

            <div class="panel panel-default">

                <div class="panel-body">

                    <form action="{{ route('dashboard.languages.index') }}" method="get">

                        <div class="row">
                            <div class="col-md-4">
                                <input type="text" placeholder="@lang('site.search')" name="search" class="form-control" value="{{ request()->search }}" autofocus>
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> @lang('site.search')</button>
                                @if (auth()->user()->hasPermission('create_languages'))
                                    <a href="{{ route('dashboard.languages.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</a>
                                @else
                                    <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i> @lang('site.add')</a>
                                @endif
                            </div>

                        </div><!-- end of row -->

                    </form><!-- end of search form -->

                    @if ($languages->count() > 0)

                        <div class="table-responsive">

                            <table class="table table-hover" style="margin-top: 10px">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('site.name')</th>
                                    <th>@lang('site.code')</th>
                                    <th>@lang('site.action')</th>
                                </tr>
                                </thead>

                                <tbody>

                                @foreach ($languages as $index=>$language)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $language->name }}</td>
                                        <td>{{ $language->code }}</td>
                                        <td>
                                            @if (auth()->user()->hasPermission('update_languages'))
                                                <a href="{{ route('dashboard.languages.edit', $language->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> @lang('site.edit')</a>
                                            @else
                                                <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i> @lang('site.edit')</a>
                                            @endif

                                            @if (auth()->user()->hasPermission('delete_languages'))
                                                <form action="{{ route('dashboard.languages.destroy', $language->id) }}" method="post" style="display: inline-block; margin-bottom: 0">
                                                    {{ csrf_field() }}
                                                    {{ method_field('delete') }}
                                                    <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> @lang('site.delete')</button>
                                                </form><!-- end of form -->

                                            @else
                                                <a href="#" class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i> @lang('site.delete')</a>
                                            @endif
                                        </td>
                                    </tr>

                                @endforeach

                                </tbody>

                            </table><!-- end of table -->

                        </div><!-- end of table responsive -->

                        {{ $languages->appends(request()->query())->links() }}
                    @else

                        <h2>@lang('site.no_data_found')</h2>

                    @endif

                </div><!-- end of panel body -->

            </div><!-- end of panel default -->

        </div><!-- end of col -->

    </div><!-- end of row -->
@endsection
