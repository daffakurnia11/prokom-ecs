<?php

namespace Database\Seeders;

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
        // $user->name             = 'Daffa Kurnia Fatah';
        // $user->email            = 'daffakurniaf11@gmail.com';
        // $user->password         = Hash::make('02311940000068');
        // $user->verified         = TRUE;
        // $user->student_number   = '02311940000068';
        // $user->batch            = '2019';
        // $user->roles            = 'Admin';
        // $user->save();
        // $getId = $user->id;
        // $profile = new Profile;
        // $profile->user_id       = $getId;
        // $profile->university    = 'Institut Teknologi Sepuluh Nopember';
        // $profile->major         = 'Teknik Fisika';
        // $profile->line_id       = 'daffakurnia11';
        // $profile->whatsapp      = '085156317473';
        // $profile->save();

        // $user = new User;
        // $user->name             = 'Arini Evita Rumapar';
        // $user->email            = 'arini.rumapar@gmail.com';
        // $user->password         = Hash::make('02311940000063');
        // $user->verified         = TRUE;
        // $user->student_number   = '02311940000063';
        // $user->batch            = '2019';
        // $user->roles            = 'Admin';
        // $user->save();
        // $getId = $user->id;
        // $profile = new Profile;
        // $profile->user_id       = $getId;
        // $profile->university    = 'Institut Teknologi Sepuluh Nopember';
        // $profile->major         = 'Teknik Fisika';
        // $profile->line_id       = 'arinirumapar';
        // $profile->whatsapp      = '089529283253';
        // $profile->save();

        // $user = new User;
        // $user->name             = 'Naufal Ikhsan Wijaya';
        // $user->email            = 'naufalikhsan65@gmail.com';
        // $user->password         = Hash::make('5009201111');
        // $user->verified         = TRUE;
        // $user->student_number   = '5009201111';
        // $user->batch            = '2020';
        // $user->roles            = 'Admin';
        // $user->save();
        // $getId = $user->id;
        // $profile = new Profile;
        // $profile->user_id       = $getId;
        // $profile->university    = 'Institut Teknologi Sepuluh Nopember';
        // $profile->major         = 'Teknik Fisika';
        // $profile->line_id       = 'naufalikhsan65';
        // $profile->whatsapp      = '082112490806';
        // $profile->save();

        $user = new User;
        $user->name             = 'Ilham Nurfalaq';
        $user->email            = 'ilham.nurfalaq@gmail.com';
        $user->password         = Hash::make('02311940000127');
        $user->verified         = TRUE;
        $user->student_number   = '02311940000127';
        $user->batch            = '2019';
        $user->roles            = 'Admin';
        $user->save();
        $getId = $user->id;
        $profile = new Profile;
        $profile->user_id       = $getId;
        $profile->university    = 'Institut Teknologi Sepuluh Nopember';
        $profile->major         = 'Teknik Fisika';
        $profile->line_id       = 'zevono';
        $profile->whatsapp      = '081245114709';
        $profile->save();

        $user = new User;
        $user->name             = 'Salma Qotrunnada H';
        $user->email            = 'salmaq34@gmail.com';
        $user->password         = Hash::make('02311940000160');
        $user->verified         = TRUE;
        $user->student_number   = '02311940000160';
        $user->batch            = '2019';
        $user->roles            = 'Admin';
        $user->save();
        $getId = $user->id;
        $profile = new Profile;
        $profile->user_id       = $getId;
        $profile->university    = 'Institut Teknologi Sepuluh Nopember';
        $profile->major         = 'Teknik Fisika';
        $profile->line_id       = 'salmaqt';
        $profile->whatsapp      = '085808215262';
        $profile->save();

        $user = new User;
        $user->name             = 'Sheren Marsha Safira';
        $user->email            = 'sherenmarshaa@gmail.com';
        $user->password         = Hash::make('5009201179');
        $user->verified         = TRUE;
        $user->student_number   = '5009201179';
        $user->batch            = '2020';
        $user->roles            = 'Admin';
        $user->save();
        $getId = $user->id;
        $profile = new Profile;
        $profile->user_id       = $getId;
        $profile->university    = 'Institut Teknologi Sepuluh Nopember';
        $profile->major         = 'Teknik Fisika';
        $profile->line_id       = 'sherenms';
        $profile->whatsapp      = '082111169752';
        $profile->save();
    }
}
