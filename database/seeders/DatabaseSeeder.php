<?php

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\BrandSeeder;
use Database\Seeders\StoreSeeder;
use Database\Seeders\JournalSeeder;


class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserSeeder::class,
            BrandSeeder::class,
            StoreSeeder::class,
            JournalSeeder::class,
        ]);
    }
}
