@extends('layouts.dashboard.app')

@section('content')

    <h1 class="page-title">@lang('site.translators')</h1>

    {{--breadcrumb--}}
    <ol class="breadcrumb breadcrumb-2">
        <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-home"></i>@lang('site.welcome')</a></li>
        <li><a href="{{ route('dashboard.translators.index') }}">@lang('site.translators')</a></li>
        <li class="active"><strong>@lang('site.add')</strong></li>
    </ol>

    <div class="row">

        <div class="col-md-12">

            <div class="panel panel-default">

                <div class="panel-body">

                    @include('dashboard.partials._errors')

                    <form action="{{ route('dashboard.translators.store') }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('post') }}

                        {{--first name--}}
                        <div class="form-group">
                            <label>@lang('site.first_name')</label>
                            <input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}">
                        </div>

                        {{--last name--}}
                        <div class="form-group">
                            <label>@lang('site.last_name')</label>
                            <input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}">
                        </div>

                        {{--email--}}
                        <div class="form-group">
                            <label>@lang('site.email')</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                        </div>

                        {{--password--}}
                        <div class="form-group">
                            <label>@lang('site.password')</label>
                            <input type="password" name="password" class="form-control">
                        </div>

                        {{--password confiramation--}}
                        <div class="form-group">
                            <label>@lang('site.password_confirmation')</label>
                            <input type="password" name="password_confirmation" class="form-control">
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

                                    @foreach ($models as $model)

                                        <tr>
                                            <td>@lang('site.' . $model)</td>
                                            <td>
                                                @php
                                                    $permissions = ['create', 'read', 'update', 'delete'];
                                                @endphp

                                                <select name="permissions[]" class="form-control select2" multiple>
                                                    @foreach ($permissions as $permission)
                                                        <option value="{{ $permission }}_{{ $model }}">@lang('site.' . $permission)</option>
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
                                                        <option value="{{ $language->id }}">{{ $language->name }}</option>
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
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of panel body -->

            </div><!-- end of panel default -->

        </div><!-- end of col -->

    </div><!-- end of row -->
@endsection

@push('scripts')

@endpush