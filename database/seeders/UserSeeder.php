<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Enums\UserEnum;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(
            [
                'name'         => 'admin',
                'email'        => env( 'ADMIN_MAIL' ),
                'password'     => Hash::make( 123456789 ),
                'account'      => UserEnum::Admin->value,
                'created_at'   => Carbon::now()->format( 'Y-m-d H:i:s' ),
                'updated_at'   => Carbon::now()->format( 'Y-m-d H:i:s' ),
            ]
        );
    }
}
