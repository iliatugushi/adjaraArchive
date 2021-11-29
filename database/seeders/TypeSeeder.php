<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['name' => 'იურიდიული პირი'],
            ['name' => 'ფიზიკური პირი'],
            ['name' => 'ჯგუფი']
        ];
        foreach ($data as $key => $val) {
            Type::create($val);
        }
    }
}
