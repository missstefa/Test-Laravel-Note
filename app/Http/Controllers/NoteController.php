<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteStoreRequest;
use App\Http\Requests\NoteUpdateRequest;
use App\Models\Note;
use App\Models\User;
use App\Services\NoteService;
use App\Services\ImageService;
use Illuminate\Contracts\View\View;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class NoteController extends Controller
{
    private NoteService $noteService;
    private ImageService $imageService;

    public function __construct(NoteService $noteService, ImageService $imageService)
    {
        $this->noteService = $noteService;
        $this->imageService = $imageService;
    }

    public function create(): view
    {
        return view('notes.create');
    }


    public function store(NoteStoreRequest $request)
    {
        $imageUrl = $this->imageService->storeImage($request);

        $data = $request->validated();

        $data['image'] = $imageUrl;

        $user = $request->user();

        $this->noteService->store($data, $user);

        return redirect('notes');
    }

    public function index(Request $request): view
    {
        $notes = QueryBuilder::for(Note::class)
            ->whereHas('users', function (Builder $query) use($request) {
                $query->where('id', $request->user()->id);
            })
            ->defaultSort('id')
            ->allowedSorts('id', 'is_important')
            ->paginate(5);


        return view('notes.index', ['notes' => $notes]);
    }

    public function show(Note $note): view
    {
        return view('notes.show', ['note' => $note]);
    }

    public function edit(Note $note): view
    {
        return view('notes.edit', ['note' => $note]);
    }

    public function update(Note $note, NoteUpdateRequest $request): view
    {
        $imageUrl = $this->imageService->storeImage($request);

        $data = $request->validated();

        $data['image'] = $imageUrl;

        $this->noteService->update($data, $note);

        return view('notes.show', ['note' => $note]);
    }

    public function delete(Note $note)
    {
        $note->delete();

        return redirect('notes');
    }
}
