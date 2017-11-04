<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $users = [];

        for ($i = 0; $i < 20; $i++) {
            $users[$i]['name'] = $faker->name;
            $users[$i]['email'] = $faker->freeEmail;
            $users[$i]['password'] = bcrypt('secret');
        }

        User::insert($users);
    }
}
