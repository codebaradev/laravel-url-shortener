<?php

namespace App\Http\Controllers;

use App\Http\Requests\Url\CreateUrlRequest;
use App\Services\UrlService;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    private UrlService $urlService;

    public function __construct(UrlService $urlService)
    {
        $this->urlService = $urlService;
    }

    public function create(CreateUrlRequest $request)
    {
        $user = $request->user();

        $data = $request->validated();

        $this->urlService->create($data, $user->id);

        return redirect()->route('dashboard');
    }

    public function update(Request $request)
    {
        
    }

    public function delete(Request $request)
    {

    }
}
