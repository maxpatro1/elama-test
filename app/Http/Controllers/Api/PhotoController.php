<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PhotoRequest;
use App\Models\Photo;
use Illuminate\Database\Eloquent\Collection;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Collection
     */
    public function getUserPhotos($request): Collection
    {
        return Photo::query()->where('owner_id', $request->user_id)->get();
    }

    public function store(PhotoRequest $request): \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
    {
        return Photo::query()->create($request->validated());
    }

    public function getRandomPhoto(): Collection
    {
        return Photo::query()->get()->random(1);
    }
}
