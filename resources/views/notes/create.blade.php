@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('New note') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('notes_store') }} " enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="title"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text"
                                           class="form-control @error('title') is-invalid @enderror" name="title">

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
                                              name="body" rows="5"></textarea>
                                    @error('body')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="important"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Important') }}</label>

                                <div class="form-check">
                                    <input class="form-check-input  @error('important') is-invalid @enderror"
                                           name="important" type="checkbox" value="" id="important">
                                    @error('important')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group col-md-6 offset-md-4">
                                <label for="image">Прикрепить файлы</label>
                                <input type="file" name="image" id="image"
                                       class="form-control-file  @error('image') is-invalid @enderror">

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