<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $categories = [
            ['title' => 'Pedagogical information'],
            ['title'=> 'announcements'],
            ['title'=> 'occurrences']
        ];
        DB::table('categories')->insert($categories);

        $permissions = [
            ['permission' => 'All permissions'],
            ['permission'=> 'Regular user'],
        ];
        DB::table('permissions')->insert($permissions);
    }
}
