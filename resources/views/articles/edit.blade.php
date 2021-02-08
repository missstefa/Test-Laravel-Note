@extends('layouts.app')

@section('content')
    {{--    {{ Breadcrumbs::render() }}--}}

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-light bg-dark">
                        <form method="POST" action="{{ route('articles.delete',['article' => $article]) }}">
                        @csrf
                        @method('DELETE')
                        <div class="container">
                            <div class="row">
                                <div class="col-10">{{ __('Article')}} {{$article->id}}</div>
                                <div class="col-2">
                                    <button type="submit"
                                            class="btn btn-danger float-right">{{ __('Delete') }}</button>
                                </div>

                            </div>
                        </div>
                        </form>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('articles.update',['article' => $article]) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="form-group row">
                            <label for="title" class="col-md-4  text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" value="{{ $article->title}}"
                                       class="form-control @error('title') is-invalid @enderror" name="title">

                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="body" class="col-md-4  text-md-right">{{ __('Body') }}</label>

                            <div class="col-md-6">
                                    <textarea id="body" class="form-control @error('body') is-invalid @enderror"
                                              name="body" rows="5">{{ $article->body}}</textarea>
                                @error('body')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="title"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Origin') }}</label>

                            <div class="col-md-6">
                                <input id="url" type="url"
                                       class="form-control @error('url') is-invalid @enderror"  value="{{ $article->url }}" name="url">
                                @error('url')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-2 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>

                        </form>
                    </div>
@endsection