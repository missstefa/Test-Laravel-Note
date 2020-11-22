@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Note') }}</div>

                    <div class="card-body">
                        <div class="form-group row">
                            <label for="title"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" readonly value="{{ $note->title}}"
                                       class="form-control" name="title">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="body"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Body') }}</label>

                            <div class="col-md-6">
                                    <textarea id="body" class="form-control" readonly
                                              name="body" rows="5">{{ $note->body}}</textarea>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="important"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Important') }}</label>

                            <div class="form-check">
                                <input class="form-check-input" onclick="return false;"
                                       {{ ($note->is_important == 1 ? ' checked' : '') }}
                                       name="important" type="checkbox" id="important">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a href="{{ route('notes_edit',['note' => $note]) }}">
                                    <button type="button" class="btn btn-primary">
                                        {{ __('Edit') }}
                                    </button>
                                </a>
                            </div>
                        </div>
@endsection