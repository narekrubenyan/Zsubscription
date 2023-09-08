<?php

namespace Database\Seeders;

use App\Models\Website;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WebsitesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $websites = [
            ['name' => 'first Website', 'domain' => 'firstwebsite.test'],
            ['name' => 'second Website', 'domain' => 'secondwebsite.test'],
            ['name' => 'third Website', 'domain' => 'thirdwebsite.test']
        ];

        Website::insert($websites);
    }
}
