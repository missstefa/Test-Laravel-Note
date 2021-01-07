<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Services\ImageService;
use App\Services\ProfileService;
use Illuminate\Support\Facades\Auth;

class ProfileController
{
    private $imageService;
    private $profileService;

    public function __construct(ImageService $imageService, ProfileService $profileService)
    {
        $this->imageService = $imageService;
        $this->profileService = $profileService;
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(ProfileUpdateRequest $request)
    {
        $data = $request->validated();
        $imageUrl = $this->imageService->storeImage($request);

        $data['image'] = $imageUrl;

        $this->profileService->update($data, $request->user());

        return redirect('profile');
    }
}