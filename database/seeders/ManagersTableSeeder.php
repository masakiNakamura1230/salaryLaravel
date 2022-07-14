<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ManagersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $managers= ['原雄一', '堤直樹', '鈴木浩輝'];

        foreach($managers as $manager){
            DB::table('managers')->insert([
                'name' => $manager,
            ]);
        }
    }
}
