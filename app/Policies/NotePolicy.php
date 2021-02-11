<?php

namespace App\Policies;

use App\Models\Note;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NotePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Note $note
     * @return mixed
     */
    public function view(User $user, Note $note)
    {

        return $note->user()->id == $user->id;
    }
}