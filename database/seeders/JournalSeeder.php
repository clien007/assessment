<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Store;
use App\Models\Journal;

class JournalSeeder extends Seeder
{
    public function run()
    {
        Store::all()->each(function ($store) {
            Journal::factory()->count(365)->create([
                'store_id' => $store->id,
            ]);
        });
    }
}
