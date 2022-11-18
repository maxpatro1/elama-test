<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    const PERMITTED_CHARS = '0123456789abcdefghijklmnopqrstuvwxyz';

    protected $fillable = [
        'long_url',
        'url'
    ];

    public function generateShortUrl(): string
    {
        return substr(str_shuffle(self::PERMITTED_CHARS), 0, 10);
    }

}
