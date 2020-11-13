<?php

namespace App\Services;

use App\Models\Note;

class NoteService
{
    public function store(array $data): void
    {
        Note::create($data);
    }
}