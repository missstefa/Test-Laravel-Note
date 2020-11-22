@extends('layouts.app')

@section('content')

    <ul class="list-group">
        @foreach ($notes as $note)
            <li class="list-group-item">{{ $note->title }}</li>
            <div>
                <form method="GET" action="{{ route('notes_show',['note' => $note]) }}">
                    @csrf
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Show') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        @endforeach
    </ul>

@endsection
