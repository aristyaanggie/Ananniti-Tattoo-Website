<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('pages.home', [
            'title' => 'Home',
            'description' => 'Ananniti Tattoo Bali - Premium custom tattoo design studio',
        ]);
    }
}
