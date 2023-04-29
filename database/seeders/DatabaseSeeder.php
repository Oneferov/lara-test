<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Position;
use App\Models\UserType;
use App\Models\User;

class DatabaseSeeder extends Seeder
{

    const SUBDIVISION_AMOUNT   = 1;
    const POSITION_AMOUNT  = 10;
    const MAX_USERS_POSITION_AMOUNT  = 3;

    const USER_TYPES_LIST = [
        'действующий офисный сотрудник',
        'архивный офисный сотрудник',
        'действующий моряк',
        'архивный моряк',
        'моряк-соискатель'
    ];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    { 
        foreach (self::USER_TYPES_LIST as $item) {
            UserType::factory()->create(['title' => $item]);
        } 

        foreach (Position::$subdivisions as $key => $item) {
            Position::factory()->count(self::POSITION_AMOUNT)->create(['subdivision_id' => $key])
                ->each(function (Position $position) use ($key) {
                
                User::factory()->count(rand(1, self::MAX_USERS_POSITION_AMOUNT))->create([
                        'user_type_id' => rand(UserType::first()->id, UserType::count()),
                        'position_id' => $position->id
                ]);
            });
        }
    }
}
