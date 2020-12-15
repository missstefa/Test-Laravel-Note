<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteStoreRequest;
use App\Http\Requests\NoteUpdateRequest;
use App\Models\Note;
use App\Services\NoteService;
use Illuminate\Http\Request;
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

    protected function storeImage(Request $request)
    {
        $path = $request->file('image')->store('public/note');
        return substr($path, strlen('public/'));
    }

    public function store(NoteStoreRequest $request)
    {
        $imageUrl = $this->storeImage($request);
        $data = $request->validated();
        
        $data['image'] = $imageUrl;

        $data['user_id'] = $request->user()->id;

        $this->noteService->store($data);


        return redirect('notes');
    }

    public function index(Request $request)
    {
        $userId = $request->user()->id;

        $notes = QueryBuilder::for(Note::class)
            ->where('user_id', $userId)
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
