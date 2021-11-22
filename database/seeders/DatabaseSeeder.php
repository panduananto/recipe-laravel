<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::table('recipes')->insert([
            [
                'title' => 'Roti bakar',
                'description' => 'Resep roti bakar garing dengan keju dan cokelat yang meleleh.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'Ayam goreng',
                'description' =>
                    'Ayam goreng dengan bumbu jahe yang gurih, asin dan bikin ketagihan!',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'Telor mata sapi',
                'description' =>
                    'Telor goreng mata sapi sederhana dengan pinggiran yang crispy dan kuning telur yang segar.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
