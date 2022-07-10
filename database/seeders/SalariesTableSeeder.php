<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalariesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $works = ['ロケ', 'イベント', '生放送'];

        foreach($works as $work){
            DB::table('salaries')->insert([
                'talent_id' => 1,
                'manager_id' => 1,
                'work' => $work,
                'working_date' => '2022-05-24',
                'salary' => 8000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
