@extends('layouts.dashboard.app')

@section('content')

    <h1 class="page-title">@lang('site.translators')</h1>

    {{--breadcrumb--}}
    <ol class="breadcrumb breadcrumb-2">
        <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-home"></i>@lang('site.welcome')</a></li>
        <li><a href="{{ route('dashboard.translators.index') }}">@lang('site.translators')</a></li>
        <li class="active"><strong>@lang('site.edit')</strong></li>
    </ol>

    <div class="row">

        <div class="col-md-12">

            <div class="panel panel-default">

                <div class="panel-body">

                    <form action="{{ route('dashboard.translators.update', $translator->id) }}" method="post">

                        {{ csrf_field() }}
                        {{ method_field('put') }}

                        @include('dashboard.partials._errors')

                        {{--first name--}}
                        <div class="form-group">
                            <label>@lang('site.first_name')</label>
                            <input type="text" name="first_name" class="form-control" value="{{ $translator->first_name }}">
                        </div>

                        {{--last name--}}
                        <div class="form-group">
                            <label>@lang('site.last_name')</label>
                            <input type="text" name="last_name" class="form-control" value="{{ $translator->last_name }}">
                        </div>

                        {{--email--}}
                        <div class="form-group">
                            <label>@lang('site.email')</label>
                            <input type="email" name="email" class="form-control" value="{{ $translator->email }}">
                        </div>

                        {{--permissions--}}
                        <div class="form-group">
                            <label>@lang('site.permissions')</label>

                            <div class="table-responsive">

                                <table class="table table-hover" style="margin-top: 10px">
                                    <thead>
                                    <tr>
                                        <th>@lang('site.model')</th>
                                        <th>@lang('site.permissions')</th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    @php
                                        $models = ['books', 'languages', 'translators']
                                    @endphp

                                    @php
                                        $permissions = ['create', 'read', 'update', 'delete'];
                                    @endphp

                                    @foreach ($models as $model)

                                        <tr>
                                            <td>@lang('site.' . $model)</td>
                                            <td>
                                                <select name="permissions[]" class="form-control select2" multiple>
                                                    @foreach ($permissions as $permission)
                                                        <option value="{{ $permission . '_' . $model}}" {{ $translator->hasPermission($permission . '_' . $model) ? 'selected' : ''}}>@lang('site.' . $permission)</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>

                                    @endforeach

                                    </tbody>

                                </table><!-- end of table -->

                            </div><!-- end of table responsive -->
                        </div>

                        {{--books--}}
                        <div class="form-group">
                            <label>@lang('site.books')</label>

                            <div class="table-responsive">

                                <table class="table table-hover" style="margin-top: 10px">
                                    <thead>
                                    <tr>
                                        <th>@lang('site.name')</th>
                                        <th>@lang('site.languages')</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    
                                    @foreach ($books as $book)

                                        <tr>

                                            <td>{{ $book->name }}</td>
                                            <td>

                                                <select name="books[{{ $book->id }}][languages][]" class="form-control select2" multiple>
                                                    @foreach ($languages as $language)

                                                        @if ($translator->books()->where('book_id', $book->id)->count() > 0)

                                                            @foreach ($translator->books()->where('book_id', $book->id)->get() as $translator_language)
                                                                <option value="{{ $language->id }}" {{ in_array($language->id, $translator_language->pivot->languages) ? 'selected' : '' }}>{{ $language->name }}</option>
                                                            @endforeach

                                                        @else
                                                            <option value="{{ $language->id }}">{{ $language->name }}</option>
                                                        @endif

                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>

                                    @endforeach


                                    </tbody>

                                </table><!-- end of table -->

                            </div><!-- end of table responsive -->
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
