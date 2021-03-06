@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render() }}

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-light bg-dark">

                        <div class="container">
                            <div class="row">
                                <div class="col-10">{{"Show Note {$note->id}"}}</div>
                                <div class="col-2">
                                    <form method="GET" action="{{ route('articles.show',['article' => $note->article_id]) }}">
                                        @csrf
                                    <button type="submit"
                                            class="btn btn-info float-right">{{"Article {$note->article_id}"}}</button>
                                    </form>
                                </div>

                            </div>
                        </div>

                </div>
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

                                <input type="radio" onclick="return false;" name="is_important" id="is_important"
                                        {{ ($note->is_important == 1 ? ' checked' : '') }}>
                            </div>

                        </div>

                        @if($note->image)
                            <div class="form-group row">
                                <div class="col d-flex justify-content-center">
                                    <img src="{{asset('storage/'.$note->image)}}" class="img-rounded pull-xs-left"
                                         width="200" height="200" alt="пися">
                                </div>
                            </div>
                        @endif


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a href="{{ route('notes.edit',['note' => $note]) }}">
                                    <button type="button" class="btn btn-primary">
                                        {{ __('Edit') }}
                                    </button>
                                </a>
                            </div>
                        </div>




@endsection