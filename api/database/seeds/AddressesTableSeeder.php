<?php

use App\Models\Address;
use App\Models\User;
use Illuminate\Database\Seeder;

class AddressesTableSeeder extends Seeder
{
    public function run()
    {
        User::all()->each(function ($user) {
            factory(Address::class)->create([
                'user_id' => $user->id
            ]);
        });
    }
}
