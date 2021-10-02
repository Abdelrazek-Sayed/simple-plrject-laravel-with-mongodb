<?php

namespace Database\Seeders;

use App\Models\Grandson;
use App\Models\Son;
use Illuminate\Database\Seeder;

class GrandSonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $abdo_id = Son::where('name', 'abdo')->first()->id;
        Grandson::create([
            'son_id' => $abdo_id,
            'name' => 'islam',
            'birth_date' => '2000-12-05',
        ]);


        $ahmed_id = Son::where('name', 'ahmed')->first()->id;
        Grandson::create([
            'son_id' => $ahmed_id,
            'name' => 'gogo',
            'birth_date' => '2002-12-05',
        ]);


        $ali_id = Son::where('name', 'ali')->first()->id;
        Grandson::create([
            'son_id' => $ali_id,
            'name' => 'abdo',
            'birth_date' => '2003-12-05',
        ]);

        $alla_id = Son::where('name', 'alaa')->first()->id;
        Grandson::create([
            'son_id' => $alla_id,
            'name' => 'abdo',
            'birth_date' => '2003-12-05',
        ]);
    }
}
