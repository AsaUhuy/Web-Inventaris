<?php

namespace Database\Seeders;

use App\Models\Petugas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyPetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $PetugasData = [
                [
                    'username' => 'Admin',
                    'password' => bcrypt('admin1'),
                    'namapetugas' => 'First Admin',
                    'idlevel' => 1,
                ],

                [
                    'username' => 'KepalaG',
                    'password' => bcrypt('kepala1'),
                    'namapetugas' => 'First KepalaG',
                    'idlevel' => 2,
                ],

                [
                    'username' => 'Operator',
                    'password' => bcrypt('operator1'),
                    'namapetugas' => 'First Operator',
                    'idlevel' => 3,
                ]
            ];

            foreach ($PetugasData as $key => $val){
                Petugas::create($val);
            }
    }
}
