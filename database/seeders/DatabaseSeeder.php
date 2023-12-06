<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $categories = [
            ['title' => 'Dicas'],
            ['title'=> 'Avisos'],
        ];
        DB::table('categories')->insert($categories);

        $tags = [
            ['title' => 'Alimentação'],
            ['title'=> 'Atividade física'],
        ];
        DB::table('tags')->insert($tags);

        $permissions = [
            ['permission' => 'Admin'],
            ['permission'=> 'Comum'],
        ];
        DB::table('permissions')->insert($permissions);
    }
}
