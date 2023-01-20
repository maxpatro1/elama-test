<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Collection extends Model
{
    protected $fillable = [
        'title',
        'owner_id',
    ];

    public function owner(): BelongsTo
    {
        return $this->BelongsTo(User::class, 'owner_id', 'id');
    }
}
