<?php

namespace Database\Seeders;

use App\Models\GearShift;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GearShiftSeeder extends Seeder
{
    const ITEMS = [
        '0 - mechanikus',
        '1 - félautomata',
        '2 - automata',
        '3 - szekvenciális',
    ];

    public function run(): void
    {
        foreach (self::ITEMS as $item){
            $entity=new GearShift(['name'=>$item]);
            $entity->save();
        }
    }
}
