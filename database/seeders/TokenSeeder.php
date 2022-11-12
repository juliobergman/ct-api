<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TokenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1|DIp8PgKEgw5fSe9ubqcgYTeDir1IjMjYN7uSQ6EL

        DB::table('personal_access_tokens')->insert([
            'id' => 1,
            'tokenable_type' => 'App\Models\User',
            'tokenable_id' => 1,
            'name' => 'test-token',
            'token' => 'b1a8c91dbd25f223f8c0680c90fdac85601f99978ad9bd96bd5789f8c6d33f54',
            'abilities' => null,
            'last_used_at' => now(),
        ]);
    }
}
