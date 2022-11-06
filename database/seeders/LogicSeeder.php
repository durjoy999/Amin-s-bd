<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;
use App\Models\Logic;

class LogicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i <10; $i++) {
            Logic::create([
                'version' => 'version3',
                'group' => 'group6',
                'class' => 'class5'
            ]);

        }
    }
}
