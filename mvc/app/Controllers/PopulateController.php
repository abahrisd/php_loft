<?php

namespace App\Controllers;

use App\Models\UserPopulateModel;
use Faker;

class PopulateController extends BasicController
{
    public function populate()
    {
        $faker = Faker\Factory::Create();

        for ($i = 0; $i < 10; $i++) {
            $user = new UserPopulateModel();
            $user->user_name = $faker->name;
            $user->user_age = $faker->numberBetween(1, 99);
            $user->user_description = $faker->text;
            $user->user_email = $faker->email;
            $user->save();
        }

        header("Location: \\user\list");
    }
}
