<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Photo extends Model
{
    protected $fillable = [
        'title',
        'owner_id',
        'average_mark',
        'location',
        'url'
    ];

    public function owner(): BelongsTo
    {
        return $this->BelongsTo(User::class, 'owner_id', 'id');
    }
}
