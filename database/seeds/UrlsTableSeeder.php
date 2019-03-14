<?php

use Illuminate\Database\Seeder;
use App\Urls;

class UrlsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        Urls::truncate();
        Urls::short("https://www.google.com.do/");
    }
}
