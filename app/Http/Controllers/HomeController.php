<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;

class HomeController extends Controller
{
    public function clear()
    {
        Artisan::call('optimize:clear');
        return "Cleared";
    }
}
