<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;


class AppController extends Controller
{
    public function index(): View
    {
        return view('home');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'short' => 'required|url'
        ]);

        $originalUrl = $request->input('short');
        $newUrl = 'http://localhost/' . substr(md5($originalUrl), 0, 6);

        return back()->with('success', $newUrl);
    }
}
