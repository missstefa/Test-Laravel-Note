@extends('layouts.app')

@section('content')

    <a href="{{ Request::fullUrlWithQuery(['sort' => 'is_important']) }}"> <button type="button" class="btn btn-warning"> Important</button></a>

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
