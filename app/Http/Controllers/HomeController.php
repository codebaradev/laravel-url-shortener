<?php

namespace App\Http\Controllers;

use App\Services\UrlService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private UrlService $urlservice;

    public function __construct(UrlService $urlservice)
    {
        $this->urlservice = $urlservice;
    }

    public function home(Request $request)
    {
        return response()->view('home');
    }

    public function dashboard(Request $request)
    {
        $user = $request->user();

        return response()->view('dashboard', [
            'urls' => $this->urlservice->getAll($user->id),
            'user' => $user,
        ]);
    }
}
