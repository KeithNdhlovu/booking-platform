<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed test Admin
        $email = 'admin@aircode.com';
        $user = User::where('email', '=', $email)->first();
        
        if ($user === null) {
            $user = User::create([
                'first_name'                     => 'Josh',
                'last_name'                      => 'Gordon',
                'email'                          => $email,
                'password'                       => Hash::make('password'),
                'user_type'                      => User::USER_TYPE_ADMIN
            ]);
        }

        // Seed test Airport Admin
        $email = 'airport-admin@aircode.com';
        $user = User::where('email', '=', $email)->first();
        
        if ($user === null) {
            $user = User::create([
                'first_name'                     => 'Harry',
                'last_name'                      => 'Styles',
                'email'                          => $email,
                'password'                       => Hash::make('password'),
                'user_type'                      => User::USER_TYPE_AIRPORT_ADMIN
            ]);
        }
    }
}
