<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PostSeedr extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Post::factory(100)->create();
    }
}
