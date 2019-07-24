<?php

use App\Models\Address;
use App\Models\User;
use Illuminate\Database\Seeder;

class AddressesTableSeeder extends Seeder
{
    public function run()
    {
        factory(Address::class, 1)->create();

        $address = Address::first();

        factory(User::class)->create([
            'email'      => 'admin@email.com',
            'address_id' => $address->id
        ]);

        factory(Address::class, 100)->create()->each(function ($address) {
            factory(User::class, 100)->create([
                'address_id' => $address->id
            ]);
        });
    }
}
