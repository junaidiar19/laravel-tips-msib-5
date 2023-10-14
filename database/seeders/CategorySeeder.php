<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = ['Alat Elektronik', 'Alat Masak', 'Alat Tulis', 'Buku', 'Pakaian', 'Sepatu', 'Tas', 'Lainnya'];

        foreach ($data as $d) {
            \App\Models\Category::create([
                'name' => $d,
            ]);
        }
    }
}
