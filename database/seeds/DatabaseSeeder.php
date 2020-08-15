<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LaratrustSeeder::class);
        factory(App\Category::class,10)->create();
        factory(App\Subcategory::class,10)->create();
        factory(App\Article::class,10)->create();
    }
}
