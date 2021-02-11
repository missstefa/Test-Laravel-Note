<?php

namespace App\Services;

use App\Models\Note;
use App\Models\User;

class NoteService
{
    public function store(array $data, User $user): void
    {
        $note =  Note::create($data);

        $user->notes()->attach($note);
    }

    public function update(array $data, Note $note): void
    {
        $note->fill($data);
        $note->save();
    }
}