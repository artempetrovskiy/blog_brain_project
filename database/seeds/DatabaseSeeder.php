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
         $this->call([
             UsersTableSeeder::class,
             TagsCategoriesSeeder::class,
             NewsTableSeeder::class,
             PostsTableSeeder::class,
             ReviewsTableSeeder::class,
             CommentsTableSeeder::class,
             MediaTableSeeder::class,
         ]);
    }
}
