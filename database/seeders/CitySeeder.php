<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $db     = \Config::get('database.connections.sqlite.database');
        $user   = \Config::get('database.connections.sqlite.username');
        $pass   = \Config::get('database.connections.sqlite.password');
        // $path = "database"

        exec("mysql -u " . $user . " -p" . $pass . " " . $db . " < eadesign_romcity.sql");
    }
}

