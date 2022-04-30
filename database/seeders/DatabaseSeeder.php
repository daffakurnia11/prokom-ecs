<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\Profile;
use App\Models\User;
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
        // \App\Models\User::factory(10)->create();

        // $user = new User;
        // $user->name             = '';
        // $user->email            = '';
        // $user->password         = Hash::make('');
        // $user->verified         = TRUE;
        // $user->student_number   = '';
        // $user->batch            = '2019';
        // $user->roles            = 'Admin';
        // $user->save();
        // $getId = $user->id;
        // $profile = new Profile;
        // $profile->user_id       = $getId;
        // $profile->university    = 'Institut Teknologi Sepuluh Nopember';
        // $profile->major         = 'Teknik Fisika';
        // $profile->line_id       = '';
        // $profile->whatsapp      = '';
        // $profile->save();

        $user = new User;
        $user->name             = 'Dimas Akbar Ferdiansyah';
        $user->email            = 'dimasakbar0152@gmail.com';
        $user->password         = Hash::make('02311940000120');
        $user->verified         = TRUE;
        $user->student_number   = '02311940000120';
        $user->batch            = '2019';
        $user->roles            = 'Admin';
        $user->save();
        $getId = $user->id;
        $profile = new Profile;
        $profile->user_id       = $getId;
        $profile->university    = 'Institut Teknologi Sepuluh Nopember';
        $profile->major         = 'Teknik Fisika';
        $profile->line_id       = 'itami_ryuuza';
        $profile->whatsapp      = '0895397845356';
        $profile->save();

        // Group::factory(14)->create();
    }
}
