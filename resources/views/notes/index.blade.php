@extends('layouts.app')

@section('content')
    <table class="table">
        <caption style="caption-side:top; text-align:center;  font-size: large; font-weight: bold">Список заметок</caption>
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Important</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
            <tbody>
            @foreach ($notes as $note)
            <tr>
                <td>{{ $note->id }}</td>
                <td>{{ $note->title }}</td>
                <td>{{ $note->is_important }}</td>
                <td>
                    <form method="GET" action="{{ route('notes_show',['note' => $note->id]) }}">
                        @csrf
                        <button type="submit" class="btn btn-primary">
                            {{ __('Show') }}
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $notes->links('vendor.pagination.bootstrap-4') }}
    </div>

@endsection
