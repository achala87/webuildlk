<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pledges;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PledgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pledges')->insert(array(
            array(
              'pledge_id' => 'p1',
              'pledge' => 'A sample pledge 1',
              'hash_tags' => '#tag1, #tag2',
              'description' => 'another description',
            ),
            array(
                'pledge_id' => 'p2',
                'pledge' => 'A sample pledge 2',
                'hash_tags' => '#tag1, #tag2',
                'description' => 'another description',
            ),
          ));
    }
}