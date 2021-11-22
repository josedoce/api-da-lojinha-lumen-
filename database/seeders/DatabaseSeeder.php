<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SeederUser::class);
        $this->call(SeederCategory::class);
        $this->call(SeederRanking::class);
        $this->call(SeederProducts::class);
    }
}
