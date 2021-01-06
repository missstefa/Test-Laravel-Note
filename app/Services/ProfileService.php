<?php


namespace App\Services;

use App\Models\User;

class ProfileService
{
    public function update(array $data, User $user): void
    {
        $user->fill($data);
        $user->save();
    }
}