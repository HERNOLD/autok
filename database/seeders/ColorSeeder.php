<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    const ITEMS = [
        [
            'name' => '01 - fehér',
            'hex_code' => '#FFFFFF',
        ],
        [
            'name' => '02 - sárga',
            'hex_code' => '#FFFF00',
        ],
        [
            'name' => '03 - narancs',
            'hex_code' => '#FFA500',
        ],
        [
            'name' => '04 - piros',
            'hex_code' => '#FF0000',
        ],
        [
            'name' => '05 - bíbor / lila',
            'hex_code' => '#800080',
        ],
        [
            'name' => '06 - kék',
            'hex_code' => '#0000FF',
        ],
        [
            'name' => '07 - zöld',
            'hex_code' => '#008000',
        ],
        [
            'name' => '08 - szürke',
            'hex_code' => '#808080',
        ],
        [
            'name' => '09 - barna',
            'hex_code' => '#A52A2A',
        ],
        [
            'name' => '10 - fekete',
            'hex_code' => '#000000',
        ],
    ];

    public function run(): void
    {
        foreach (self::ITEMS as $item){
            $entity=new Color();
            $entity->name=$item['name'];
            $entity->hex_code=$item['hex_code'];
            $entity->save();
        }
    }
}
