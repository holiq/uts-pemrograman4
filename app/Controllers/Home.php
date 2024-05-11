<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RedirectResponse;

class Home extends BaseController
{
    public function index(): RedirectResponse | string
    {
        if (!session()->get('name')) {
            return redirect()->route('Login::index');
        }
        return view('home');
    }
}
