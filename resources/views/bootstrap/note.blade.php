<tr>
    <td>{{ $note->id }}</td>
    <td>{{ $note->title }}</td>
    <td>{{ $note->is_important }}</td>
    <td>{{ $note->getFormatDateForIndex() }}</td>
    <td>{{ $note->users->first()->name }}</td>
    <td>
        <form method="GET" action="{{ route('notes.show',['note' => $note->id]) }}">
            @csrf
            <button type="submit" class="btn btn-primary">
                {{ __('Show') }}
            </button>
        </form>
    </td>
</tr>