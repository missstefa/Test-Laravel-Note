@extends('layouts.app')

@section('content')
{{--    {{ Breadcrumbs::render() }}--}}

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-light bg-dark">{{"Show Article {$article->id}"}}</div>

                    <div class="card-body">
                        <div class="form-group row">
                            <label for="title"
                                   class="col-md-4 col-form-label text-md-right">Title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" readonly value="{{ $article->title}}"
                                       class="form-control" name="title">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="body"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Body') }}</label>

                            <div class="col-md-6">
                                    <textarea id="body" class="form-control" readonly
                                              name="body" rows="5">{{ $article->body}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="body"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Origin') }}</label>

                            <div class="col-md-6">
                                <input id="url" type="url" class="form-control" readonly
                                              name="url" value="{{ $article->url }}">
                            </div>
                        </div>
                        

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a href="{{ route('articles.edit',['article' => $article]) }}">
                                    <button type="button" class="btn btn-primary">
                                        {{ __('Edit') }}
                                    </button>
                                </a>
                            </div>
                        </div>




@endsection