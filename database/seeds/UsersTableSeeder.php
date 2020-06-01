<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // reset the users table
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();

        $products = [
            'Alex',
            'Alina',
            'Aliboy',
            'Manu',
            'Tom',
        ];


        #------ new faker object
        $faker = Factory::create();

        // generate 3 users/author
        DB::table('users')->insert([
            [
                'name' => $products[rand(0, count($products) - 1)],
                'email' => "johndoe@test.com",
                'slug' => 'slug-user-1',
                'password' => bcrypt('secret'),
                'bio' => $faker->text(rand(250, 300))
            ],
            [
                'name' => $products[rand(0, count($products) - 1)],
                'email' => "janedoe@test.com",
                'slug' => 'slug-user-2',
                'password' => bcrypt('secret'),
                'bio' => $faker->text(rand(250, 300)),
            ],
            [
                'name' => $products[rand(0, count($products) - 1)],
                'email' => "edo@test.com",
                'slug' => 'slug-user-3',
                'password' => bcrypt('secret'),
                'bio' => $faker->text(rand(250, 300))
            ],
            [
                'name' => $products[rand(0, count($products) - 1)],
                'email' => "edo1@test.com",
                'slug' => 'slug-user-4',
                'password' => bcrypt('secret'),
                'bio' => $faker->text(rand(250, 300))
            ],
        ]);

    }
}
