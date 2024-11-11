<?php

namespace Database\Seeders;

use App\Models\Body;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BodySeeder extends Seeder
{
    const ITEMS = [
        'Crossover',
        'Fastback',
        'Hardtop',
        'Hatchback',
        'Kabrió',
        'Kombi',
        'Kupé',
        'Liftback',
        'Limuzin',
        'Minivan',
        'Pickup',
        'Roadster',
        'Szedán',
        'Targa',
    ];

    public function run(): void
    {
        foreach (self::ITEMS as $item){
            $entity=new Body(['name'=>$item]);
            $entity->save();
        }
    }
}
