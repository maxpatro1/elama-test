<?php

namespace App\Serializers;

use App\Models\Link;

class LinkSerializer
{
    const BASE_URl = 'http://127.0.0.1/';

    static function transform(Link $item): array
    {
        return [
            'url' => 'http://127.0.0.1/' . $item->url,
        ];
    }
}
