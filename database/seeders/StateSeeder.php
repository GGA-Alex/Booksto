<?php

namespace Database\Seeders;

use App\Models\Municipality;
use Illuminate\Database\Seeder;
use App\Models\State;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        State::factory(32)->create()->search(function (State $state) {
            Municipality::factory(20)->create([
                'state_id' => $state->id
            ]);
        });
    }
}
