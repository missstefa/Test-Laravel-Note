@extends('layouts.app')

@section('content')

    <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Sort
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="{{ Request::fullUrlWithQuery(['sort' => 'id']) }}">ID</a>
            <a class="dropdown-item" href="{{ Request::fullUrlWithQuery(['sort' => '-is_important']) }}">Important</a>
            <a class="dropdown-item" href="{{ Request::fullUrlWithQuery(['sort' => 'is_important']) }}">Unimportant</a>
        </div>
    </div>

    <table class="table">
        <caption style="caption-side:top; text-align:center;  font-size: large; font-weight: bold">List of notes</caption>
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Important</th>
            <th scope="col">Created date</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
            <tbody>
            @foreach ($notes as $note)
            <tr>
                <td>{{ $note->id }}</td>
                <td>{{ $note->title }}</td>
                <td>{{ $note->is_important }}</td>
                <td>{{ $note->getFormatDateForIndex() }}</td>
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
        {{ $notes->appends(request()->query())->links('vendor.pagination.bootstrap-4') }}
    </div>

@endsection
