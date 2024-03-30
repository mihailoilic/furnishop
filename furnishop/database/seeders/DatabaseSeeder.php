<?php

namespace Database\Seeders;

use App\Models\ColorProduct;
use App\Models\User;
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
            MenuSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            CollectionSeeder::class,
            ColorSeeder::class,
            ProductSeeder::class,
            CategoryProductSeeder::class,
            ColorProductSeeder::class,
            ImageSeeder::class,
            ProductImageSeeder::class,
            LookbookSeeder::class,
            LookbookItemSeeder::class,
            SliderImageSeeder::class,
            LogCategorySeeder::class
        ]);
    }
}
