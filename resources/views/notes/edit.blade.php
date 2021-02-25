@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render() }}

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-light bg-dark">
                        <form method="POST" action="{{ route('notes.delete',['note' => $note]) }}">
                            @csrf
                            @method('DELETE')
                            <div class="container">
                                <div class="row">
                                    <div class="col-10">{{ __('Note')}} {{$note->id}}</div>
                                    <div class="col-2">
                                        <button type="submit"
                                                class="btn btn-danger float-right">{{ __('Delete') }}</button>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('notes.update',['note' => $note]) }}"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="form-group row">
                                <label for="title" class="col-md-4  text-md-right">{{ __('Title') }}</label>

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
                                <label for="body" class="col-md-4  text-md-right">{{ __('Body') }}</label>

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
                                <label for="important" class="col-md-4 text-md-right">{{ __('Important') }}</label>

                                <div class="form-check">
                                    <input class="@error('important') is-invalid @enderror"
                                           {{ ($note->is_important == 1 ? ' checked' : '') }}
                                           name="is_important" type="checkbox" id="important">
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="form-group col-md-6 offset-md-4">
                                    @if(!$note->image)
                                        <img id="image" width="100" height="100"
                                             src="https://www.w3adda.com/wp-content/uploads/2019/09/No_Image-128.png"/>
                                    @else
                                        <img src="{{asset('storage/'.$note->image)}}" class="img-rounded pull-xs-left"
                                             id="image" width="200" height="200" alt="image">
                                    @endif
                                </div>


                                <div class="form-group col-md-6 offset-md-4">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <label class="custom-file-label" for="image">Choose file</label>

                                            <input type="file" class="custom-file-input" id="image" name="image"
                                                   onchange="loadPreview(this);">
                                        </div>

                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary">Delete</button>
                                        </div>
                                    </div>
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