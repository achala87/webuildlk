<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Organizations;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class OrganizationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('organizations')->insert([
            'title' => 'Department of Forest Conservation - Head Quarters',
            'district' => 'Colombo',
            'org_type' => 'Government',
            'description' => 'Sample Description for this organization',
            'related_ministry' => 'Ministry 1',
            'status' => 1,
        ]);
        
		\DB::table('organizations')->insert([
            'title' => 'Department of Wildlife Conservation - Head Quarters',
            'district' => 'Colombo',
            'org_type' => 'Government',
            'description' => 'Sample Description for this organization',
            'related_ministry' => 'Ministry 1',
            'status' => 1,
        ]);
    }
}