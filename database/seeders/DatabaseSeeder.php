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
        $user->name             = 'Atras Yonda Farizi';
        $user->email            = 'atrasfarizi02@gmail.com';
        $user->password         = Hash::make('5009201127');
        $user->verified         = TRUE;
        $user->student_number   = '5009201127';
        $user->batch            = '2020';
        $user->roles            = 'Admin';
        $user->save();
        $getId = $user->id;
        $profile = new Profile;
        $profile->user_id       = $getId;
        $profile->university    = 'Institut Teknologi Sepuluh Nopember';
        $profile->major         = 'Teknik Fisika';
        $profile->line_id       = 'atras_yonda';
        $profile->whatsapp      = '081913114241';
        $profile->save();
        
        $user = new User;
        $user->name             = 'I Gede Sanjaya P.V';
        $user->email            = 'sanjaya12bjm@gmail.com';
        $user->password         = Hash::make('02311940000083');
        $user->verified         = TRUE;
        $user->student_number   = '02311940000083';
        $user->batch            = '2019';
        $user->roles            = 'Admin';
        $user->save();
        $getId = $user->id;
        $profile = new Profile;
        $profile->user_id       = $getId;
        $profile->university    = 'Institut Teknologi Sepuluh Nopember';
        $profile->major         = 'Teknik Fisika';
        $profile->line_id       = 'deadted';
        $profile->whatsapp      = '088258002509';
        $profile->save();
        
        $user = new User;
        $user->name             = 'Ilham Maulana Aldias';
        $user->email            = 'ilhammaulana233@gmail.com';
        $user->password         = Hash::make('02311940000159');
        $user->verified         = TRUE;
        $user->student_number   = '02311940000159';
        $user->batch            = '2019';
        $user->roles            = 'Admin';
        $user->save();
        $getId = $user->id;
        $profile = new Profile;
        $profile->user_id       = $getId;
        $profile->university    = 'Institut Teknologi Sepuluh Nopember';
        $profile->major         = 'Teknik Fisika';
        $profile->line_id       = 'ilhammaulanaald';
        $profile->whatsapp      = '08117103099';
        $profile->save();
        
        $user = new User;
        $user->name             = 'Kevin Ezra Patar H';
        $user->email            = 'tkevinrocket@gmail.com';
        $user->password         = Hash::make('02311940000143');
        $user->verified         = TRUE;
        $user->student_number   = '02311940000143';
        $user->batch            = '2019';
        $user->roles            = 'Admin';
        $user->save();
        $getId = $user->id;
        $profile = new Profile;
        $profile->user_id       = $getId;
        $profile->university    = 'Institut Teknologi Sepuluh Nopember';
        $profile->major         = 'Teknik Fisika';
        $profile->line_id       = 'armx17';
        $profile->whatsapp      = '08118472355';
        $profile->save();
        
        $user = new User;
        $user->name             = 'Bima Prasetya Nurhidayat';
        $user->email            = 'bimaprasetyanurhidayat@gmail.com';
        $user->password         = Hash::make('02311940000091');
        $user->verified         = TRUE;
        $user->student_number   = '02311940000091';
        $user->batch            = '2019';
        $user->roles            = 'Admin';
        $user->save();
        $getId = $user->id;
        $profile = new Profile;
        $profile->user_id       = $getId;
        $profile->university    = 'Institut Teknologi Sepuluh Nopember';
        $profile->major         = 'Teknik Fisika';
        $profile->line_id       = 'bimaprs';
        $profile->whatsapp      = '082125529805';
        $profile->save();
    }
}
