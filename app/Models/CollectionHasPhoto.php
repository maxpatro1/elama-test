<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CollectionHasPhoto extends Model
{
    protected $fillable = [
        'photo_id',
        'collection_id',
    ];

    public function photo(): BelongsTo
    {
        return $this->BelongsTo(Photo::class, 'photo_id', 'id');
    }

    public function collection(): BelongsTo
    {
        return $this->BelongsTo(Collection::class, 'collection_id', 'id');
    }
}
