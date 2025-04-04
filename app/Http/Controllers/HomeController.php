<?php

namespace App\Http\Controllers;

use App\Http\Requests\Url\CreateUrlRequest;
use App\Services\UrlService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private UrlService $urlService;

    public function __construct(UrlService $urlService)
    {
        $this->urlService = $urlService;
    }

    public function home()
    {
        return response()->view('home');
    }

    public function shorten(CreateUrlRequest $request)
    {
        $user = $request->user();

        $data = $request->validated();

        $url = $this->urlService->create($data, $user ? $user->id : null);

        return response()->view('url.shorten', [
            'url' => $url,
        ]);
    }

    public function dashboard(Request $request)
    {
        $user = $request->user();

        return response()->view('dashboard', [
            'urls' => $this->urlService->getAll($user->id),
            'user' => $user,
        ]);
    }
}
