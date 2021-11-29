<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Carbon\Carbon;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $new  = new Admin;
        $new->name = 'Admin';
        $new->email = 'admin@example.com';
        $new->password = bcrypt('password');
        $new->save();
    }
}
