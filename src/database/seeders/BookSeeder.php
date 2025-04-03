<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) { // Tạo 50 bản ghi
            DB::table('books')->insert([
                'title' => $faker->sentence(3), // Tiêu đề ngẫu nhiên
                'category_id' => rand(1, 10), // Thay đổi theo số category thực tế
                'author' => $faker->name, // Tên tác giả ngẫu nhiên
                'quantity' => $faker->numberBetween(1, 100), // Số lượng ngẫu nhiên
                'price' => $faker->randomFloat(2, 5, 100), // Giá ngẫu nhiên
                'image' => 'path/to/image.jpg', // Hình ảnh (có thể thay đổi)
                'description' => $faker->paragraph, // Mô tả ngẫu nhiên
            ]);
        }
    }
}
