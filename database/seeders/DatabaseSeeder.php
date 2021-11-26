<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Ramsey\Uuid\Uuid;

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
                'ingredients' => json_encode([
                    [
                        'id' => Uuid::uuid4(),
                        'name' => 'Roti tawar',
                        'amount' => '12 roti',
                    ],
                    [
                        'id' => Uuid::uuid4(),
                        'name' => 'Meses cokelat',
                        'amount' => 'secukupnya',
                    ],
                    [
                        'id' => Uuid::uuid4(),
                        'name' => 'Keju kotak tipis',
                        'amount' => '6 slices',
                    ],
                ]),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'category_id' => 1,
                'user_id' => 1,
            ],
            [
                'title' => 'Ayam goreng',
                'description' =>
                    'Ayam goreng dengan bumbu jahe yang gurih, asin dan bikin ketagihan!',
                'ingredients' => json_encode([
                    [
                        'id' => Uuid::uuid4(),
                        'name' => 'Ayam utuh',
                        'amount' => '1 ayam',
                    ],
                    [
                        'id' => Uuid::uuid4(),
                        'name' => 'Jahe',
                        'amount' => '80 gr',
                    ],
                    [
                        'id' => Uuid::uuid4(),
                        'name' => 'air',
                        'amount' => '200 ml',
                    ],
                    [
                        'id' => Uuid::uuid4(),
                        'name' => 'bawang putih',
                        'amount' => '5 siung',
                    ],
                    [
                        'id' => Uuid::uuid4(),
                        'name' => 'ketumbar, merica putih',
                        'amount' => '1 sdt',
                    ],
                    [
                        'id' => Uuid::uuid4(),
                        'name' => 'garam',
                        'amount' => '1 sdm',
                    ],
                    [
                        'id' => Uuid::uuid4(),
                        'name' => 'minyak goreng',
                        'amount' => 'secukupnya',
                    ],
                ]),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'category_id' => 2,
                'user_id' => 1,
            ],
            [
                'title' => 'Telor mata sapi',
                'description' =>
                    'Telor goreng mata sapi sederhana dengan pinggiran yang crispy dan kuning telur yang segar.',
                'ingredients' => json_encode([
                    [
                        'id' => Uuid::uuid4(),
                        'name' => 'telur',
                        'amount' => '2 butir atau semaunya',
                    ],
                    [
                        'id' => Uuid::uuid4(),
                        'name' => 'minyak goreng',
                        'amount' => 'secukupnya',
                    ],
                    [
                        'id' => Uuid::uuid4(),
                        'name' => 'garam',
                        'amount' => '1/2 sdt per telur',
                    ],
                ]),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'category_id' => 1,
                'user_id' => 1,
            ],
            [
                'title' => 'Risol ayam',
                'description' =>
                    'Resep risol ayam dengan kulit yang garing serta isian ayam yang juicy, lembut dan gurih...',
                'ingredients' => json_encode([
                    [
                        'id' => Uuid::uuid4(),
                        'name' => 'ayam',
                        'amount' => '300 gr',
                    ],
                    [
                        'id' => Uuid::uuid4(),
                        'name' => 'kentang',
                        'amount' => '200 gr',
                    ],
                    [
                        'id' => Uuid::uuid4(),
                        'name' => 'wortel',
                        'amount' => '200 gr',
                    ],
                    [
                        'id' => Uuid::uuid4(),
                        'name' => 'telur',
                        'amount' => '3 butir',
                    ],
                    [
                        'id' => Uuid::uuid4(),
                        'name' => 'kaldu bubuk, gula pasir, garam',
                        'amount' => '1 sdt',
                    ],
                    [
                        'id' => Uuid::uuid4(),
                        'name' => 'bawang merah, bawang putih',
                        'amount' => '5 siung',
                    ],
                    [
                        'id' => Uuid::uuid4(),
                        'name' => 'minyak goreng',
                        'amount' => 'secukupnya',
                    ],
                    [
                        'id' => Uuid::uuid4(),
                        'name' => 'tepung terigu',
                        'amount' => '240 gr',
                    ],
                    [
                        'id' => Uuid::uuid4(),
                        'name' => 'air',
                        'amount' => '600 ml',
                    ],
                ]),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'category_id' => 5,
                'user_id' => 1,
            ],
            [
                'title' => 'Brownies cokelat',
                'description' =>
                    'Ini adalah resep brownies cokelat yang lembut seperti busa dengan rasa cokelat murni yang manis.',
                'ingredients' => json_encode([
                    [
                        'id' => Uuid::uuid4(),
                        'name' => 'cokelat bubuk',
                        'amount' => '2 sdm',
                    ],
                    [
                        'id' => Uuid::uuid4(),
                        'name' => 'tepung terigu',
                        'amount' => '5 cup tepung terigu',
                    ],
                    [
                        'id' => Uuid::uuid4(),
                        'name' => 'telur',
                        'amount' => '2 butir',
                    ],
                    [
                        'id' => Uuid::uuid4(),
                        'name' => 'margarin',
                        'amount' => '150 gram',
                    ],
                    [
                        'id' => Uuid::uuid4(),
                        'name' => 'gula pasir',
                        'amount' => '1 sdm',
                    ],
                    [
                        'id' => Uuid::uuid4(),
                        'name' => 'coklat chococips',
                        'amount' => '1 cup',
                    ],
                ]),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'category_id' => 4,
                'user_id' => 1,
            ],
            [
                'title' => 'Banana pancakes',
                'description' =>
                    'Banana pancakes sangat nikmat disantap untuk sarapan dengan gizi pisang yang memberikan banyak energi, cocok untuk memulai hari!',
                'ingredients' => json_encode([
                    [
                        'id' => Uuid::uuid4(),
                        'name' => 'pisang',
                        'amount' => '2 buah',
                    ],
                    [
                        'id' => Uuid::uuid4(),
                        'name' => 'telur',
                        'amount' => '1 butir',
                    ],
                    [
                        'id' => Uuid::uuid4(),
                        'name' => 'tepung terigu',
                        'amount' => '12 sdm',
                    ],
                    [
                        'id' => Uuid::uuid4(),
                        'name' => 'gula pasir',
                        'amount' => '3 sdm',
                    ],
                    [
                        'id' => Uuid::uuid4(),
                        'name' => 'susu cair',
                        'amount' => '100 ml',
                    ],
                    [
                        'id' => Uuid::uuid4(),
                        'name' => 'minyak goreng',
                        'amount' => '1 sdm',
                    ],
                    [
                        'id' => Uuid::uuid4(),
                        'name' => 'baking powder, garam',
                        'amount' => '1 sdt',
                    ],
                ]),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'category_id' => 1,
                'user_id' => 1,
            ],
            [
                'title' => 'Muffin cokelat',
                'description' =>
                    'Kue muffin cokelat yang manis ditabur chocochip yang menambah kemanisannya!',
                'ingredients' => json_encode([
                    [
                        'id' => Uuid::uuid4(),
                        'name' => 'margarin',
                        'amount' => '100 gram',
                    ],
                    [
                        'id' => Uuid::uuid4(),
                        'name' => 'gula pasir',
                        'amount' => '100 gram',
                    ],
                    [
                        'id' => Uuid::uuid4(),
                        'name' => 'telur',
                        'amount' => '2 butir',
                    ],
                    [
                        'id' => Uuid::uuid4(),
                        'name' => 'dark cooking chocolate',
                        'amount' => '75 gram',
                    ],
                    [
                        'id' => Uuid::uuid4(),
                        'name' => 'susu full cream',
                        'amount' => '75 ml',
                    ],
                    [
                        'id' => Uuid::uuid4(),
                        'name' => 'tepung terigu',
                        'amount' => '200 gram',
                    ],
                    [
                        'id' => Uuid::uuid4(),
                        'name' => 'cokelat bubuk',
                        'amount' => '20 gram',
                    ],
                    [
                        'id' => Uuid::uuid4(),
                        'name' => 'chococips',
                        'amount' => '2 cup',
                    ],
                ]),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'category_id' => 5,
                'user_id' => 1,
            ],
            [
                'title' => 'Nasi goreng Hongkong',
                'description' => 'Resep nasi goreng Hongkong yang gurih...',
                'ingredients' => json_encode([
                    [
                        'id' => Uuid::uuid4(),
                        'name' => 'nasi putih',
                        'amount' => '3 piring',
                    ],
                    [
                        'id' => Uuid::uuid4(),
                        'name' => 'telur ayam',
                        'amount' => '2 butir',
                    ],
                    [
                        'id' => Uuid::uuid4(),
                        'name' => 'bawang merah, bawang putih',
                        'amount' => '4 buah',
                    ],
                    [
                        'id' => Uuid::uuid4(),
                        'name' => 'daun bawang',
                        'amount' => '2 batang',
                    ],
                    [
                        'id' => Uuid::uuid4(),
                        'name' => 'dada ayam fillet',
                        'amount' => '1 genggang',
                    ],
                    [
                        'id' => Uuid::uuid4(),
                        'name' => 'sosis',
                        'amount' => '2 buah',
                    ],
                    [
                        'id' => Uuid::uuid4(),
                        'name' => 'saos tiram, minyak wijen',
                        'amount' => '1 sdm',
                    ],
                    [
                        'id' => Uuid::uuid4(),
                        'name' => 'kecap manis, asin, ikan',
                        'amount' => '1 sdm',
                    ],
                ]),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'category_id' => 1,
                'user_id' => 1,
            ],
            [
                'title' => 'Ikan gurame goreng tepung',
                'description' =>
                    'Ikan gurame goreng tepung yang gurih dan lezat, cocok untuk menu makan siang!',
                'ingredients' => json_encode([
                    [
                        'id' => Uuid::uuid4(),
                        'name' => 'gurame ukuran sedang',
                        'amount' => '2 ekor',
                    ],
                    [
                        'id' => Uuid::uuid4(),
                        'name' => 'tepung tapioka',
                        'amount' => '200 gram',
                    ],
                    [
                        'id' => Uuid::uuid4(),
                        'name' => 'jeruk nipis atau lemon',
                        'amount' => '1 buah',
                    ],
                    [
                        'id' => Uuid::uuid4(),
                        'name' => 'putih telur',
                        'amount' => '2 butir',
                    ],
                    [
                        'id' => Uuid::uuid4(),
                        'name' => 'bawang putih',
                        'amount' => '2 siung',
                    ],
                    [
                        'id' => Uuid::uuid4(),
                        'name' => 'minyak wijen',
                        'amount' => '2 sdm',
                    ],
                    [
                        'id' => Uuid::uuid4(),
                        'name' => 'bumbu penyedap, garam, merica',
                        'amount' => 'secukupnya',
                    ],
                ]),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'category_id' => 2,
                'user_id' => 1,
            ],
            [
                'title' => 'Salad buah',
                'description' =>
                    'Salad buah adalah makanan yang sangat bergizi, cocok bagi yang ingin diet!!',
                'ingredients' => json_encode([
                    [
                        'id' => Uuid::uuid4(),
                        'name' => 'buah-buahan (mangga, anggur, leci, naga)',
                        'amount' => 'secukupnya',
                    ],
                    [
                        'id' => Uuid::uuid4(),
                        'name' => 'keju parut',
                        'amount' => 'secukupnya',
                    ],
                    [
                        'id' => Uuid::uuid4(),
                        'name' => 'yogurt (squeeze cimory)',
                        'amount' => '1 saset',
                    ],
                    [
                        'id' => Uuid::uuid4(),
                        'name' => 'mayonnaise',
                        'amount' => '1 saset',
                    ],
                    [
                        'id' => Uuid::uuid4(),
                        'name' => 'susu kental manis',
                        'amount' => '2 bungkus',
                    ],
                ]),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'category_id' => 1,
                'user_id' => 1,
            ],
        ]);
    }
}
