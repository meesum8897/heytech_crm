<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\employees;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class employeetable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $numberOfTimes = 15;
        for ($i = 0; $i < $numberOfTimes; $i++) 
        {
            $emp = employees::create([
                'first_name' => Str::random(10),
                'last_name' => Str::random(10),
                'company_id' => "1",
                'email' => Str::random(10).'@gmail.com',
                'phone' => Str::random(10),
            ]);
        }
    }
}
