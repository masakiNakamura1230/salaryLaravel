<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TalentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $talents = ['山口託矢', '大池瑞樹', '中村昌樹', '薮佑介'];

        foreach($talents as $talent){
            DB::table('talents')->insert([
                'name' => $talent,
            ]);
        }
    }
}
