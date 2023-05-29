<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\companies;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class companytable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $numberOfTimes = 10;
        for ($i = 0; $i < $numberOfTimes; $i++) 
        {
            $company = companies::create([
                'name' => Str::random(10),
                'email' => Str::random(10).'@gmail.com',
                'logo' => Str::random(10),
                'website' => "www".Str::random(10).".com",
            ]);
        }
    }
}
