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

    public function migrate()
    {
        Artisan::call('migrate:fresh --seed');
        return "Migrated";
    }
}
