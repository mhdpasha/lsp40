<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Controller;

class ReactController extends Controller
{
    public function home()
    {
        return inertia('Home');
    }

    public function sertifikasi()
    {
        return inertia('Sertifikasi');
    }

    public function informasi()
    {
        return inertia('Informasi');
    }
}
