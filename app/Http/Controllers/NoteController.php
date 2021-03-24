<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteStoreRequest;
use App\Http\Requests\NoteUpdateRequest;
use App\Models\Article;
use App\Models\Note;
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

    public function create(Article $article): view
    {
        return view('notes.create', ['article' => $article]);
    }


    public function store(NoteStoreRequest $request)
    {
        $data = $request->validated();


        $data['image'] = $this->imageService->storeImage($request);

        $this->noteService->store($data, $request->user());

        return redirect('notes');
    }

    public function index(Request $request): view
    {
        $notes = QueryBuilder::for(Note::class)
            ->whereHas(
                'users',
                function (Builder $query) use ($request) {
                    $query->where('id', $request->user()->id);
                }
            )
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
        $data = $request->validated();

        $data['image'] = $this->imageService->storeImage($request);

        $this->noteService->update($data, $note);

        return view('notes.show', ['note' => $note]);
    }

    public function delete(Note $note)
    {
        $note->delete();

        return redirect('notes');
    }
}
