<?php

use Illuminate\Database\Seeder;

class BlogTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\BlogType::class, 50)->create()->each(function ($u) {
            $u->posts()->save(factory(App\BlogType::class)->make());
        });
    }
}
