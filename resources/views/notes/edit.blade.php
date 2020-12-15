@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-light bg-dark">{{ __('Note') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('notes_update',['note' => $note]) }}">
                            @csrf
                            @method('PATCH')

                            <div class="form-group row">
                                <label for="title"
                                       class="col-md-4  text-md-right">{{ __('Title') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" value="{{ $note->title}}"
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
                                       class="col-md-4  text-md-right">{{ __('Body') }}</label>

                                <div class="col-md-6">
                                    <textarea id="body" class="form-control @error('body') is-invalid @enderror"
                                              name="body" rows="5">{{ $note->body}}</textarea>
                                    @error('body')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="important"
                                       class="col-md-4 text-md-right">{{ __('Important') }}</label>

                                <div class="form-check">
                                    <input class="@error('important') is-invalid @enderror"
                                           {{ ($note->is_important == 1 ? ' checked' : '') }}
                                           name="important" type="radio" id="important">
                                    @error('important')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group col-md-6 offset-md-4">
                                <label for="photo">Прикрепить файлы</label>
                                <input type="file" name="file" id="file" class="form-control-file" required>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Save') }}
                                    </button>
                                </div>
                            </div>

                        </form>

                        <br>
                        <form method="POST" action="{{ route('notes_delete',['note' => $note]) }}">
                            @csrf
                            @method('DELETE')

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-danger">
                                        {{ __('Delete') }}
                                    </button>
                                </div>
                            </div>
                        </form>
@endsection