<?php

namespace Database\Seeders;

use App\Models\Experience;
use App\Models\Link;
use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $user = \App\Models\User::factory()->create([
             'name' => 'Elie Kitadi',
             'email' => 'elk.dev.official@gmail.com',
             'password' => Hash::make('password')
         ]);

         $profile = Profile::factory()->create([
             'user_id' => $user->id
         ]);

         Experience::factory(5)->create([
             'profile_id' => $profile->id
         ]);

         Link::factory( 3)->create([
            'profile_id' => $profile->id
         ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
