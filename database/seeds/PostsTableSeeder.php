<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use Carbon\Carbon;
class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Reset the user table
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        // reset the posts table
        DB::table('posts')->truncate();

        // generate 10 dummy posts data
        $posts = [];
        $faker = Factory::create();
            #----this fake data will be like this:2020-05-10, 2020-05-11, 2020-05-12, etc
        $date = Carbon::create(2020, 5, 9, 9);

        for ($contador = 1; $contador <= 10; $contador++)
        {

            $image = "Post_Image_" . rand(1, 5) . ".jpg";
            $date->addDays(1);

            $publishedDate = clone ($date);
            #----new object
            $createdDate = clone ($date);

            $posts[] = [
                'author_id' => rand(1, 4),
                'title' => $faker->sentence(rand(8, 12)),
                #---- fake random text
                'excerpt' => $faker->text(rand(250, 300)),
                'body' => $faker->paragraphs(rand(10, 15), true),
                'slug' => $faker->slug(),
                #----- si el valor no es 1 entonces que el valor sea nulo
                'image' => rand(0, 1) == 1 ? $image : NULL,
                'created_at' => $createdDate,
                'updated_at' => $createdDate,
                'published_at' => $contador < 5 ?  $publishedDate : ( rand(0, 1) == 0 ? NULL : $publishedDate->addDays(4)),
                'view_count'   => rand(1, 10) * 10,

            ];
        }

        DB::table('posts')->insert($posts);
    }

}
