<?php

namespace App\Http\Controllers;

use App\Http\Requests\Url\CreateUrlRequest;
use App\Http\Requests\Url\UpdateUrlRequest;
use App\Services\UrlService;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\ResponseEvent;

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

    public function update(UpdateUrlRequest $request, int $id)
    {
        $user = $request->user();

        $request->authorize('');

        $data = $request->validated();

        $this->urlService->update($data, $id, $user->id);

        return redirect()->route('dashboard');
    }

    public function delete(Request $request, int $id)
    {
        $user = $request->user();

        $this->urlService->delete($id, $user->id);

        return redirect()->route('dashboard');
    }
}
