<?php

use Illuminate\Database\Seeder;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Recipe::class, 50)->create()->each(function ($recipe) {
            $timing = new App\Timing;
            $timing->action = 'Start cooking';
            $timing->start_time = 0;
            $recipe->timings()->save($timing);

            factory(App\Timing::class, 10)->make()->each(function($timing) use ($recipe) {
                $recipe->timings()->save($timing);
            });
        });
    }
}
