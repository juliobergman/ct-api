<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserData;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(1)
        ->state([
            'id' => 1,
            'name' => env('OWNER_NAME'),
            'email' => env('OWNER_EMAIL'),
            'email_verified_at' => now(),
            'password' => Hash::make(env('OWNER_PASSWORD')),
            'remember_token' => null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ])
        ->has(UserData::factory()->state([
            'country' => env('OWNER_COUNTRY'),
            // 'site' => '',
            // 'phone' => '',
            // 'city' => '',
            // 'address' => '',
        ]))
        ->create();
    }
}
