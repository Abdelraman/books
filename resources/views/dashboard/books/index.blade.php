@extends('layouts.dashboard.app')

@section('content')

    <h1 class="page-title">@lang('site.books')</h1>

    {{--breadcrumb--}}
    <ol class="breadcrumb breadcrumb-2">
        <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-home"></i>@lang('site.welcome')</a></li>
        <li class="active"><strong>@lang('site.books')</strong></li>
    </ol>


    <div class="row">

        <div class="col-md-12">

            <div class="panel panel-default">

                <div class="panel-body">

                    <form action="{{ route('dashboard.books.index') }}" method="get">

                        <div class="row">
                            <div class="col-md-4">
                                <input type="text" placeholder="@lang('site.search')" name="search" class="form-control" value="{{ request()->search }}" autofocus>
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> @lang('site.search')</button>
                                <a href="{{ route('dashboard.books.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</a>
                            </div>

                        </div><!-- end of row -->

                    </form><!-- end of search form -->

                    @if ($books->count() > 0)

                        <div class="table-responsive">

                            <table class="table table-hover" style="margin-top: 10px">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('site.name')</th>
                                    <th>@lang('site.folder_name')</th>
                                    <th>@lang('site.number_of_pages')</th>
                                    <th>@lang('site.action')</th>
                                </tr>
                                </thead>

                                <tbody>

                                @foreach ($books as $index=>$book)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $book->name }}</td>
                                        <td>{{ $book->folder_name }}</td>
                                        <td>{{ $book->number_of_pages }}</td>
                                        <td>
                                            @if (auth()->user()->hasPermission('update_books'))
                                                <a href="{{ route('dashboard.books.edit', $book->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> @lang('site.edit')</a>
                                            @endif

                                            @if (auth()->user()->hasPermission('delete_books'))
                                                <form action="{{ route('dashboard.books.destroy', $book->id) }}" method="post" style="display: inline-block; margin-bottom: 0">
                                                    {{ csrf_field() }}
                                                    {{ method_field('delete') }}
                                                    <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> @lang('site.delete')</button>
                                                </form><!-- end of form -->
                                            @endif
                                        </td>
                                    </tr>

                                @endforeach

                                </tbody>

                            </table><!-- end of table -->

                        </div><!-- end of table responsive -->

                        {{ $books->appends(request()->query())->links() }}
                    @else

                        <h2>@lang('site.no_data_found')</h2>

                    @endif

                </div><!-- end of panel body -->

            </div><!-- end of panel default -->

        </div><!-- end of col -->

    </div><!-- end of row -->
@endsection
