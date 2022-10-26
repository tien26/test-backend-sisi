<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "admin",
            'email' => "admin@gmail.com",
            'password' => bcrypt(12345),
            'email_verified_at' => now()->format('Y-m-d H:i:s')
        ]);

        // User::create([$user]);
    }
}
