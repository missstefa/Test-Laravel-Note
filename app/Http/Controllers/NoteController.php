<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteStoreRequest;
use App\Models\Note;
use App\Services\NoteService;

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
        $notes = Note::all();
        return view('notes.index', ['notes' => $notes]);
    }

    public function show()
    {
        $note = Note::first();
        return view('notes.show', ['note' => $note]);
    }

    public function edit()
    {
        
    }

    public function update()
    {
        $note = Note::first();
        return view('notes.update', ['note' => $note]);
    }
}
