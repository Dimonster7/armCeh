<?php

use App\Models\Sessions;
use Illuminate\Database\Seeder;

class SessionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Sessions::class, 'session', 10)->create();
    }
}
