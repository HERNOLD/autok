<?php

namespace Database\Seeders;

use App\Models\Models;
use App\Models\Maker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class getmodels extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $file = fopen("car-db.csv","r");
        fgetcsv($file, 1000, ',');
        fgetcsv($file, 1000, ',');
        $adatok = array();
        while (($data = fgetcsv($file, 1000, ',')) !== FALSE) {
            if(!in_array($data[2].";".$data[1],$adatok)){
                array_push($adatok, $data[2].";".$data[1]);
            }
        }
        fclose($file);

        $this->command->getOutput()->progressStart(count($adatok));

        foreach($adatok as $adat)
        {
            $makerId = Maker::where('name', explode(';', $adat)[1])->first()->id;
            $model_name=explode(';', $adat)[0];

            $enttity=new Models();
            $enttity->maker_id =$makerId;
            $enttity->name=$model_name;
            $enttity->save();

            $this->command->getOutput()->progressAdvance();
        }
        $this->command->getOutput()->progressFinish();
    }
}
