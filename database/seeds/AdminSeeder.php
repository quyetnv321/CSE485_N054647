<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('admin')->insert([
            'user_name' => "admin".rand(0,20),
            'password' => 123456,
            'name' => "ADMIN",
        ]);
    }
}
