<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\User::factory(10)->create();
        // $this->call(ArticleSeeder::class);
        // $this->call(UserSeeder::class);
        Article::factory(10)->create(); //added create from factory function
    }
}
