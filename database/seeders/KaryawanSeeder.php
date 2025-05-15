<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Karyawan;

class KaryawanSeeder extends Seeder
{
    public function run(): void
    {
        Karyawan::insert([
            [
                'name' => 'Tholhas Tampubolon',
                'position' => 'Manejer & Pendiri',
                'image' => 'tholhas.jepg',
            ],
            [
                'name' => 'Ruhut Ksatria Tampubolon',
                'position' => 'Cook helper',
                'image' => 'Ruhut Tampu.jpg',
            ],
            [
                'name' => 'Jese tingkos Tampubolon',
                'position' => 'Cook Helper',
                'image' => 'Jese Tampubolon.jpg',
            ],
            [
                'name' => 'Zefri Gusman Halawa',
                'position' => 'Manejer & Pemilik',
                'image' => 'zafri hero.jpg',
            ],
        ]);
    }
}
