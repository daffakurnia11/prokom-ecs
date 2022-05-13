<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\Participant;
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
        $user->name             = 'Daffa Kurnia';
        $user->email            = 'deltakilo1110@gmail.com';
        $user->password         = Hash::make('123123123');
        $user->verified         = TRUE;
        $user->student_number   = '02311940000001';
        $user->batch            = '2019';
        $user->save();

        $getId = $user->id;
        $profile = new Profile;
        $profile->user_id       = $getId;
        $profile->university    = 'Institut Teknologi Sepuluh Nopember';
        $profile->major         = 'Teknik Fisika';
        $profile->save();

        $participant = new Participant;
        $participant->user_id       = $getId;
        $participant->classes       = 'C';
        $participant->krsm          = '02311940000001_KRSM.pdf';
        $participant->payment       = '02311940000001_Payment.png';
        $participant->screenshot    = '02311940000001_Screenshot.png';
        $participant->group_number  = '1';
        $participant->save();

        // Group::factory(22)->create();
    }
}
