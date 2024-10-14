<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Maker;
use function Laravel\Prompts\progress;

class getmakers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mysql:fill_makers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Uploads car makers';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        config(["database.connections.mysql.database" => 'autok']);
 
        $file = fopen("car-db.csv","r");
        fgetcsv($file, 1000, ',');
        fgetcsv($file, 1000, ',');
        $adatok = array();
        while (($data = fgetcsv($file, 1000, ',')) !== FALSE) {
            if(!in_array($data[1],$adatok)){
                array_push($adatok, $data[1]);
            }
        }

        $progressBar = progress(label:"Uploading makers", steps: count($adatok));
        $progressBar->start();

        foreach ($adatok as $x) {
            $enttity=new Maker();
            $enttity->name=$x;
            $enttity->save();
            $progressBar->advance();
        }

        $progressBar->finish();
 
        fclose($file);
    }
}
