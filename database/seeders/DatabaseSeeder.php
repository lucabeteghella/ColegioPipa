<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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

        $users = [
            [
                'name' => 'Bruno Risso',
                'email' => 'brunorisso@email.com',
                'phone_number' => '+55 19 99999-9999',
                'cpf' => '12345678910',
                'permission_id' => 1,
                'password' => Hash::make('teste'),
            ]
        ];
        DB::table('users')->insert($users);
    }
}
