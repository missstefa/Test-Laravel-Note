@extends('layouts.app')

@section('content')

    <ul class="list-group">
        @foreach ($notes as $note)
            <li class="list-group-item">{{ $note->title }}</li>
        @endforeach
    </ul>

@endsection
