<?php

namespace Database\Seeders;

use App\Models\Fuels;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FuelSeeder extends Seeder
{
    const ITEMS = 
    [
        'benzin','dízel','benzin/lpg','benzin/cng','dízel/lpg','dízel/cng','hibrid (benzin)','hibrid (dízel)','elektromos','etanol','biodízel','LPG','CNG','hidrogén',
    ];

    public function run(): void
    {
        foreach (self::ITEMS as $item){
            $entity=new Fuels(['name'=>$item]);
            $entity->save();
        }
    }
}
