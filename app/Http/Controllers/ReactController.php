<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Controller;

class ReactController extends Controller
{
    public function home()
    {
        return Inertia::render('Home');
    }

    public function sertifikasi()
    {
        return Inertia::render('Sertifikasi');
    }

    public function informasi()
    {
        return Inertia::render('Informasi');
    }
}
