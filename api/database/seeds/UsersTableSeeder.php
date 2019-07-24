<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        factory(User::class)->create([
            'email' => 'admin@email.com'
        ]);

        factory(User::class, 100)->create();
    }
}
