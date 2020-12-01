@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-light bg-dark">{{"Edit Note {$note->id}"}}</div>

                    <div class="card-body">

                            <div class="form-group row">
                                <label for="title"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

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
                                       class="col-md-4 col-form-label text-md-right">{{ __('Body') }}</label>

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
                                <label for="is_important"
                                       class="col-md-4 text-md-right">{{ __('Important') }}</label>

                                <div class="col-md-6">
                                    <input type="radio" class="@error('important') is-invalid @enderror"
                                           {{ ($note->is_important == 1 ? ' checked' : '') }}
                                           name="is_important" id="is_important">
                                    @error('important')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        

                            <div class="btn-group col-md-6 offset-md-4" role="group" aria-label="Basic example">
                                <div class="btn-group" role="group" aria-label="First group">
                                    <form method="POST" action="{{ route('notes_update',['note' => $note]) }}">
                                        @csrf
                                        @method('PATCH')
                                    <button name="save" type="submit" class="btn btn-primary"> {{ __('Save') }}</button>
                                    </form>

                                </div>


                                <div class="btn-group" role="group" aria-label="Second group">
                                    <form method="POST" action="{{ route('notes_delete',['note' => $note]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button name="delete" type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>

                            </div>
                    </div>


@endsection