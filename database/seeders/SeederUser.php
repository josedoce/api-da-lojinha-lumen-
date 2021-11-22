<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SeederUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id'=>2,
            'name'=>'maria',
            'email'=>'maria@gmail.com',
            'password'=>Hash::make('123'),
            'role'=>'admin',
            'last_logged_in'=>'2020-06-26T23:44:28',
            "created_at"=> "2020-06-26T23:44:28",
            "updated_at"=> "2020-06-26T23:44:28"
        ]);
    }
}
