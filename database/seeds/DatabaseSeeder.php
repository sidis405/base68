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
        App\User::create(
            [
                'name' => 'Sid',
                'email' => 'forge405@gmail.com',
                'role' => 'admin',
                'password' => bcrypt(env('TESTPASS')),
            ]
        );

        // vogliamo 10 utenti
        factory(App\User::class, 9)->create();


        $users = App\User::all();


        $categories = factory(App\Category::class, 20)->create();

        $tags = factory(App\Tag::class, 40)->create();

        foreach ($users as $user) {
            // per ciascun utente vogliamo 15 post
            // ciascun post vogliamo assegnarlo a una categoria random (ESISTENTE)
            $posts = factory(App\Post::class, 15)->create(
                [
                    'user_id' => $user->id,
                    'category_id' => collect($categories)->random()->id,
                ]
            );

            foreach ($posts as $post) {
                // ciascun post vogliamo assegnarlo 3 tags random (ESISTENTI)
                $randomTags = collect($tags)->random(3)->pluck('id')->toArray();
                $post->tags()->sync($randomTags);
            }
        }
    }
}
