<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

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
        $schemaName = $this->argument('name') ?: config("database.connections.mysql.database");
        $charset = config("database.connections.mysql.charset",'utf8mb4');
        $collation = config("database.connections.mysql.collation",'utf8mb4_unicode_ci');

        $open = fopen("car-db.csv", "r");
        $data = fgetcsv($open, 1000, ",");

        while (($data = fgetcsv($open, 1000, ",")) !== FALSE) 
        {
            $maker_name=$data[1];

            $query = "INSERT INTO autok (name) VALUES ($maker_name)";

            DB::statement($query);
        }

        fclose($open);

        config(["database.connections.mysql.database" => null]);
    }
}
