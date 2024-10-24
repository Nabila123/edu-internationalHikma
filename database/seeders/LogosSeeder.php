<?php

namespace Database\Seeders;

use App\Models\Main\Logos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LogosSeeder extends Seeder
{
    public function run(): void
    {
        $paramLogos = [
            [
                'uuid' => getUuid(),
                'kategori' => 'utama',
            ],
            [
                'uuid' => getUuid(),
                'kategori' => 'header',
            ],
            [
                'uuid' => getUuid(),
                'kategori' => 'component',
            ],
        ];

        foreach ($paramLogos as $data) {
            Logos::create(
                [
                    'uuid' => $data['uuid'],
                    'kategori' => $data['kategori'],
                ]
            );
        }
    }
}
