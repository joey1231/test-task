<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CreateWebsiteSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $websites = [
            [
                'name' => 'test 1',
                'url' => 'http://test1.com',
                'description' => 'test dec',
            ],
            [
                'name' => 'test 2',
                'url' => 'http://test1.com',
                'description' => 'test dec',
            ],
            [
                'name' => 'test 3',
                'url' => 'http://test3.com',
                'description' => 'test dec',
            ],
        ];

        foreach ($websites as $website) {
            $w = \App\Models\Website::updateOrCreate(['name' => $website['name']], $website);
        }
    }
}
