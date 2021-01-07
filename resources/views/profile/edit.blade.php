@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row my-2">
            <div class="col-lg-8 order-lg-2">
                <div class="content py-4">
                    <div>
                        <form role="form" method="POST" action="{{ route('profile.update') }}"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <div class="form-group col-md-6 offset-md-4">
                                    @if(!$user->image)
                                        <img id="image" width="100" height="100"
                                             src="https://www.w3adda.com/wp-content/uploads/2019/09/No_Image-128.png"/>
                                    @else
                                        <img src="{{asset('storage/'.$user->image)}}" class="img-rounded pull-xs-left"
                                             id="image" width="200" height="200" alt="image">
                                    @endif
                                </div>


                                <div class="form-group col-md-6 offset-md-4">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <label for="image"></label>
                                            <input type="file" class="form-control-file" id="image" name="image" onchange="loadPreview(this);">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Full name</label>
                                <div class="col-lg-9">
                                    <input class="form-control @error('full_name') is-invalid @enderror"
                                           name="full_name" type="text" value="{{ $user->full_name }}">
                                    @error('full_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                <div class="col-lg-9">
                                    <input class="form-control @error('email') is-invalid @enderror" name="email"
                                           type="email" value="{{ $user->email }}">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Username</label>
                                <div class="col-lg-9">
                                    <input class="form-control @error('name') is-invalid @enderror" name="name"
                                           type="text" value="{{ $user->name }}">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Age</label>
                                <div class="col-lg-9">
                                    <input readonly class="form-control" type="text" value="{{ $user->age }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label"></label>
                                <div class="col-lg-9">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Save') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>

@endsection