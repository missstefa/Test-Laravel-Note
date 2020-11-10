<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function create()
    {
        return view('notes.create');
    }

    public function store(Request $request)
    {
        Note::create($request->all());

        return redirect('notes');
    }

    public function index()
    {
        $notes = Note::all();
        return view('notes.index', ['notes' => $notes]);
    }
}
