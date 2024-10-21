<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Maker;

class LogoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $logoNames=scandir("./public/logos");
        foreach($logoNames as $logo){
            Maker::where('name', str_replace("_"," ",explode(".",$logo)[0]))->update(['logo' => 'logos/'.$logo]);
        }
    }
}
