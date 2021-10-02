<?php

namespace Database\Seeders;

use App\Models\Son;
use App\Models\User;
use Illuminate\Database\Seeder;

class SonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sayed_id = User::where('name', 'sayed')->first()->id;
        Son::create([
            'user_id' => $sayed_id,
            'name' => 'abdo',
            'birth_date' => '1992-12-05',
        ]);

        Son::create([
            'user_id' => $sayed_id,
            'name' => 'ahmed',
            'birth_date' => '1992-10-05',
        ]);


        $salama_id = User::where('name', 'salama')->first()->id;
        Son::create([
            'user_id' => $salama_id,
            'name' => 'ali',
            'birth_date' => '1992-11-05',
        ]);

        Son::create([
            'user_id' => $salama_id,
            'name' => 'alaa',
            'birth_date' => '1992-12-03',
        ]);
    }
}
