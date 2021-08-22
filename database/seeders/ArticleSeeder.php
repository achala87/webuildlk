<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use Carbon\Carbon;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert(array(
            array(
              'title' => 'Migration and Seeder',
              'category' => json_encode(array('testcat1', 'testcat1')),
              'seo_keywords' => 'fertilizer ban, cows and cheese',
              'seo_description' => 'another description',
              'acontent' => 'Laravel',
              'slug' => 'seeded-article1',
              'featured' => 0,
              'user_id' => 1,
              'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
              'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ),
            array(
              'title' => 'Featured article seeded',
              'category' => json_encode(array('testcat3', 'testcat4', 'featured')),
              'acontent' => 'this is a sample content',
              'slug' => 'seeded-article2',
              'seo_keywords' => 'another label, another random label',
              'seo_description' => 'another description',
              'featured' => 1,
              'user_id' => 2,
              'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
              'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ),
          ));
    }
}