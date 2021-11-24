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

        DB::table('users')->insert([
            [
                'name' => 'Udnap Otnana',
                'email' => 'udnapotnana@gmail.com',
                'password' => bcrypt('password'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Pandu Ananto Hogantara',
                'email' => 'pandunih@gmail.com',
                'password' => bcrypt('password'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);

        DB::table('categories')->insert([
            [
                'name' => 'Breakfast',
                'slug' => 'breakfast-recipes',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Lunch',
                'slug' => 'lunch-recipes',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Dinner',
                'slug' => 'dinner-recipes',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Desserts',
                'slug' => 'desserts-recipes',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Side dish',
                'slug' => 'side-dish-recipes',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);

        DB::table('recipes')->insert([
            [
                'title' => 'Roti bakar',
                'description' => 'Resep roti bakar garing dengan keju dan cokelat yang meleleh.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'category_id' => 1,
                'user_id' => 1,
            ],
            [
                'title' => 'Ayam goreng',
                'description' =>
                    'Ayam goreng dengan bumbu jahe yang gurih, asin dan bikin ketagihan!',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'category_id' => 2,
                'user_id' => 1,
            ],
            [
                'title' => 'Telor mata sapi',
                'description' =>
                    'Telor goreng mata sapi sederhana dengan pinggiran yang crispy dan kuning telur yang segar.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'category_id' => 1,
                'user_id' => 1,
            ],
        ]);
    }
}
