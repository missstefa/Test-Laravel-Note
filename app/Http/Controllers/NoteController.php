<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteStoreRequest;
use App\Http\Requests\NoteUpdateRequest;
use App\Models\Note;
use App\Services\NoteService;
use Illuminate\Support\Facades\DB;

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

    public function index()
    {
        $notes = Note::paginate(10);

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
        return view('notes.edit', ['note' => $note]);
    }
    public function delete(Note $note)
    {
        $note->delete();
        return redirect('notes');
    }
}
