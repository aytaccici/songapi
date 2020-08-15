<?php

use Illuminate\Database\Seeder;
use  \App\Models\Application;

class ApplicationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['id'                 => 1,
             'name'               => 'IOS',
             'version'            => '1.0',
             'language_version'   => '1.0',
             'is_update_required' => false
            ],
            ['id'                 => 2,
             'name'               => 'Android',
             'version'            => '1.0',
             'language_version'   => '1.0',
             'is_update_required' => false
            ],
        ];


        foreach ($items as $item) {
            Application::create($item);
        }

    }
}
