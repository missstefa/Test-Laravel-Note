@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('New note') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('notes.store') }} " enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="title"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text"
                                           class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}">

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="body"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Body') }}</label>

                                <div class="col-md-6">
                                    <textarea id="body" class="form-control @error('body') is-invalid @enderror"
                                              name="body" rows="5">{{ old('body') }}</textarea>
                                    @error('body')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="article_id"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Article ID') }}</label>

                                <div class="col-md-6">
                                    <input id="article_id" type="text" readonly value="{{ $article->id}}"
                                           class="form-control" name="article_id">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="important" class="col-md-4 text-md-right">{{ __('Important') }}</label>

                                <div class="form-check">
                                    <input class="form-check-input"
                                           name="is_important" type="checkbox" id="important" >

                                </div>
                            </div>


                            <div class="form-group col-md-6 offset-md-4">
                                <img id="image" width="200" height="200"
                                     src="https://www.w3adda.com/wp-content/uploads/2019/09/No_Image-128.png"/>
                            </div>

                            <div class="form-group col-md-6 offset-md-4">
                                <label class="custom-file-label" for="image">Choose file</label>
                                <input type="file" name="image" id="image"
                                       class="custom-file-input @error('image') is-invalid @enderror"
                                       onchange="loadPreview(this);" value="{{ old('image') }}" )>

                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Save') }}
                                    </button>
                                </div>
                            </div>

                        </form>


@endsection