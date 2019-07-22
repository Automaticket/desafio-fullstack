<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Factory(\App\Entities\User::class,1)->create([
            'email' => 'admin@user.com.br'
        ]);
    }
}
