<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mark extends Model
{
    protected $fillable = [
        'appraiser_id',
        'mark',
        'photo_id',
    ];

    public function owner(): BelongsTo
    {
        return $this->BelongsTo(User::class, 'appraiser_id', 'id');
    }

    public function photo(): BelongsTo
    {
        return $this->BelongsTo(Photo::class, 'photo_id', 'id');
    }
}
