<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            'name' => 'adminUser',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'is_superuser' => 1,
        ]);
        
		\DB::table('users')->insert([
            'name' => Str::random(5),
            'email' => Str::random(5).'@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
