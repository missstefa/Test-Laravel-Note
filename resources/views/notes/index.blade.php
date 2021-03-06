@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render() }}

    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
        <div class="btn-group" role="group">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                Sort
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="{{ Request::fullUrlWithQuery(['sort' => 'id']) }}">ID</a>
                <a class="dropdown-item"
                   href="{{ Request::fullUrlWithQuery(['sort' => '-is_important']) }}">Important</a>
                <a class="dropdown-item"
                   href="{{ Request::fullUrlWithQuery(['sort' => 'is_important']) }}">Unimportant</a>
            </div>
        </div>
    </div>

    <table class="table">
        <caption style="caption-side:top; text-align:center;  font-size: large; font-weight: bold">List of notes
        </caption>
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Important</th>
            <th scope="col">Created date</th>
            <th scope="col">User name</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($notes as $note)
            @include('bootstrap.note', ['note' => $note])
        @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $notes->appends(request()->query())->links('vendor.pagination.bootstrap-4') }}
    </div>

@endsection
