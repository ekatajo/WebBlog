<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(3)->create();
        User::create([
            "name"   => "Bangwotss",
            "email"  => "Bangwotss@gmail.com",
            "username" => "Admin",
            "password" => bcrypt('12345')
        ]);
        // User::create([
        //     "name"   => "Dialogue",
        //     "email"  => "Dialogue@gmail.com",
        //     "password" => bcrypt('12345')
        // ]);

        Category::create([
            "name" => "Aesthetics",
            "slug" => "aesthetic",
            
        ]);
        Category::create([
            "name" => "Abstract",
            "slug" => "abstract",
        ]);
        Category::create([
            "name" => "Indonesian",
            "slug" => "indonesian",
        ]);

        Post::factory(25)->create();

        // Post::create([
        //     'title'  => 'Judul 1',
        //     'slug'   => 'judul-1',                  
        //     'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam rem non itaque laboriosam aliquid. Quos asperiores error debitis harum amet, quia, qui blanditiis repellendus quisquam mollitia neque temporibus id ipsum?',
        //     'body'   => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis aperiam sint dolores ipsa ipsum! Beatae, est architecto itaque nisi rem harum ad impedit laborum, porro non nostrum error magnam. Fugiat quae aliquid ex dolorem, reiciendis nihil similique mollitia quos odit quo. Dignissimos, nulla mollitia. Commodi alias ab voluptatum consequuntur optio cum at tempore dolor explicabo beatae. Dicta id iste sequi provident quia quod quae similique assumenda eveniet? Sit, corrupti laborum, neque eos maiores, dolores fugit incidunt esse cupiditate eius perferendis. Dolorem fuga, saepe culpa cum tempore cupiditate perferendis minima odit distinctio sint! Officia, eum. Impedit, amet animi, nostrum rerum enim dignissimos dolores itaque doloremque praesentium adipisci omnis porro, officia corporis blanditiis mollitia sint consequatur a. Earum, praesentium placeat libero iusto dolorum porro mollitia repellendus officia.',
        //     'category_id' => 2,
        //     'user_id' => 1
        // ]);
        // Post::create([
        //     'title'  => 'Judul 2',
        //     'slug'   => 'judul-2',                  
        //     'excerpt'=> 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veniam aut quisquam deleniti ab laborum porro odio fugit, tempore, ullam earum hic vel similique unde voluptate.',
        //     'body'   => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Architecto quis ut placeat maxime veniam, eveniet aperiam eligendi sapiente deserunt beatae odio tempora consectetur! At eveniet a iste saepe. Culpa eius quas eos, consequatur dolores commodi tenetur assumenda asperiores! Sint numquam aliquam corrupti illum accusamus impedit laudantium consectetur voluptatum, maxime a accusantium asperiores fugiat excepturi perspiciatis modi, rerum perferendis. Optio iusto vero maxime dolorem consequuntur. Eligendi quam cumque doloremque dolore minus aspernatur assumenda. Quidem accusantium nobis, necessitatibus asperiores quis tenetur placeat doloremque et consectetur excepturi non!',
        //     'category_id' => 1,
        //     'user_id' => 2
        // ]);
    }
}
