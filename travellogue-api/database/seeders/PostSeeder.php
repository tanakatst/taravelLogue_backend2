<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('ja_JP');
        for($i = 0; $i < 10; $i ++) {
            $post = [
                'title' => $faker->realText,
                'prefecture' => $faker->realText,
                'date' => $faker->dateTime(),
                'place_name' => $faker->country,
                'content' => $faker->realText,
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ];
            \Illuminate\Support\Facades\DB::table('posts')->insert($post);
        }
    }
}
