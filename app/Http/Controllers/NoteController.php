<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteStoreRequest;
use App\Http\Requests\NoteUpdateRequest;
use App\Models\Note;
use App\Services\NoteService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\QueryBuilder;

class NoteController extends Controller
{
    protected NoteService $noteService;

    public function __construct(NoteService $noteService)
    {
        $this->noteService = $noteService;
    }

    public function create()
    {
        return view('notes.create');
    }

    public function store(NoteStoreRequest $request)
    {
        $this->noteService->store($request->validated());

        return redirect('notes');
    }

    public function index(Request $request)
    {
        $notes = QueryBuilder::for(Note::class)
            ->defaultSort('id')
            ->allowedSorts('id', 'is_important')
            ->paginate(5);

        return view('notes.index', ['notes' => $notes]);
    }

    public function show(Note $note)
    {
        return view('notes.show', ['note' => $note]);
    }

    public function edit(Note $note)
    {
        return view('notes.edit', ['note' => $note]);
    }

    public function update(Note $note, NoteUpdateRequest $request)
    {
        $this->noteService->update($request->validated(), $note);

        return view('notes.show', ['note' => $note]);
    }
    public function delete(Note $note)
    {
        $note->delete();
        return redirect('notes');
    }
}
