<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LinkRequest;
use App\Models\Link;
use App\Serializers\LinkSerializer;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class LinkController extends Controller
{

    public function redirectToLongUrl(string $shortUrl): Redirector|RedirectResponse|Application
    {
        $link = Link::query()->where('url', $shortUrl)->first();
        if ($link) {
            return redirect($link->long_url);
        }
        return abort(404);
    }

    public function storeLink(LinkRequest $request): array
    {
        $oldLink = Link::query()->where('long_url', $request->longUrl)->first();
        if ($oldLink) {
            return LinkSerializer::transform($oldLink);
        }
        $newLink = new Link();
        $newLink->long_url = $request->longUrl;
        $newLink->url = $newLink->generateShortUrl();
        $newLink->save();
        return LinkSerializer::transform($newLink);
    }
}
