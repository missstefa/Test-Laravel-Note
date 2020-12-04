@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-light bg-dark">{{"Show Note {$note->id}"}}</div>

                    <div class="card-body">
                        <div class="form-group row">
                            <label for="title"
                                   class="col-md-4 col-form-label text-md-right">Title</label>

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
                            <label for="is_important"
                                   class="col-md-4 text-md-right">{{ __('Important') }}</label>

                            <div class="col-md-6">

                                <input type="radio" onclick="return false;"  name="is_important" id="is_important"
                                        {{ ($note->is_important == 1 ? ' checked' : '') }}>
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