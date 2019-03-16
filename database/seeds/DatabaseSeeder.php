<?php

use Illuminate\Database\Seeder;
use App\Urls;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        Urls::truncate();
        Urls::short("https://www.google.com.do/");
        
        /**
         * Create Gest User
         */
        User::truncate();
        User::create([
            'name' => "GEST",
            'email' => "GEST@ekhzxzrv@sharklasers.com",
            'password' => Hash::make("GEST1234"),
        ]);
    }
}
