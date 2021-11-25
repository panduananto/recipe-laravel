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
            [
                'title' => 'Risol ayam',
                'description' =>
                    'Resep risol ayam dengan kulit yang garing serta isian ayam yang juicy, lembut dan gurih...',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'category_id' => 5,
                'user_id' => 1,
            ],
            [
                'title' => 'Brownies cokelat',
                'description' =>
                    'Ini adalah resep brownies cokelat yang lembut seperti busa dengan rasa cokelat murni yang manis.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'category_id' => 4,
                'user_id' => 1,
            ],
            [
                'title' => 'Banana pancakes',
                'description' =>
                    'Banana pancakes sangat nikmat disantap untuk sarapan dengan gizi pisang yang memberikan banyak energi, cocok untuk memulai hari!',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'category_id' => 1,
                'user_id' => 1,
            ],
            [
                'title' => 'Muffin cokelat',
                'description' =>
                    'Kue muffin cokelat yang manis ditabur chocochip yang menambah kemanisannya!',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'category_id' => 5,
                'user_id' => 1,
            ],
            [
                'title' => 'Nasi goreng Hongkong',
                'description' => 'Resep nasi goreng Hongkong yang gurih...',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'category_id' => 1,
                'user_id' => 1,
            ],
            [
                'title' => 'Nasi goreng Hongkong',
                'description' => 'Resep nasi goreng Hongkong yang gurih...',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'category_id' => 1,
                'user_id' => 1,
            ],
            [
                'title' => 'Ikan gurame goreng tepung',
                'description' =>
                    'Ikan gurame goreng tepung yang gurih dan lezat, cocok untuk menu makan siang!',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'category_id' => 2,
                'user_id' => 1,
            ],
            [
                'title' => 'Salad buah',
                'description' =>
                    'Salad buah adalah makanan yang sangat bergizi, cocok bagi yang ingin diet!!',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'category_id' => 1,
                'user_id' => 1,
            ],
        ]);
    }
}
