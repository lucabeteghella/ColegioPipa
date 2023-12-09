<?php

namespace Database\Seeders;

use App\Models\Category;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['title' => 'Pedagogical information'],
            ['title'=> 'announcements'],
            ['title'=> 'occurrences']
        ];

        DB::table('categories')->insert($categories);
    }
}
