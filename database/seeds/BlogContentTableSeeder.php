<?php

use Illuminate\Database\Seeder;

class BlogContentTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\BlogContent::class, 50)->create()->each(function ($u) {
            $u->posts()->save(factory(App\BlogContent::class)->make());
        });
    }
}
