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

        $user = new User;
        $user->name             = 'Riski Suhajianto';
        $user->email            = 'rsuhajianto@gmail.com';
        $user->password         = Hash::make('02311940000003');
        $user->verified         = TRUE;
        $user->student_number   = '02311940000003';
        $user->batch            = '2019';
        $user->roles            = 'Admin';
        $user->save();
        $getId = $user->id;
        $profile = new Profile;
        $profile->user_id       = $getId;
        $profile->university    = 'Institut Teknologi Sepuluh Nopember';
        $profile->major         = 'Teknik Fisika';
        $profile->line_id       = 'r_suhajianto';
        $profile->whatsapp      = '081368806466';
        $profile->save();

        $user = new User;
        $user->name             = 'Reyhan Qomara';
        $user->email            = 'qomarareyhan@gmail.com';
        $user->password         = Hash::make('02311940000119');
        $user->verified         = TRUE;
        $user->student_number   = '02311940000119';
        $user->batch            = '2019';
        $user->roles            = 'Admin';
        $user->save();
        $getId = $user->id;
        $profile = new Profile;
        $profile->user_id       = $getId;
        $profile->university    = 'Institut Teknologi Sepuluh Nopember';
        $profile->major         = 'Teknik Fisika';
        $profile->line_id       = 'reyhanqomara';
        $profile->whatsapp      = '082137433885';
        $profile->save();

        $user = new User;
        $user->name             = 'M Faiz Rahmadani';
        $user->email            = 'fzrahmadan@gmail.com';
        $user->password         = Hash::make('5009201112');
        $user->verified         = TRUE;
        $user->student_number   = '5009201112';
        $user->batch            = '2020';
        $user->roles            = 'Admin';
        $user->save();
        $getId = $user->id;
        $profile = new Profile;
        $profile->user_id       = $getId;
        $profile->university    = 'Institut Teknologi Sepuluh Nopember';
        $profile->major         = 'Teknik Fisika';
        $profile->line_id       = 'fzrahmadan';
        $profile->whatsapp      = '082213574819';
        $profile->save();

        $user = new User;
        $user->name             = 'Fani Ahmad Refansah';
        $user->email            = 'fani.refansah@gmail.com';
        $user->password         = Hash::make('5009201131');
        $user->verified         = TRUE;
        $user->student_number   = '5009201131';
        $user->batch            = '2020';
        $user->roles            = 'Admin';
        $user->save();
        $getId = $user->id;
        $profile = new Profile;
        $profile->user_id       = $getId;
        $profile->university    = 'Institut Teknologi Sepuluh Nopember';
        $profile->major         = 'Teknik Fisika';
        $profile->line_id       = 'faniahmadref';
        $profile->whatsapp      = '081249847619';
        $profile->save();

        $user = new User;
        $user->name             = 'Lazuardi Raihan';
        $user->email            = 'lazuardi_lr@windowslive.com';
        $user->password         = Hash::make('5009201006');
        $user->verified         = TRUE;
        $user->student_number   = '5009201006';
        $user->batch            = '2020';
        $user->roles            = 'Admin';
        $user->save();
        $getId = $user->id;
        $profile = new Profile;
        $profile->user_id       = $getId;
        $profile->university    = 'Institut Teknologi Sepuluh Nopember';
        $profile->major         = 'Teknik Fisika';
        $profile->line_id       = '1927mu';
        $profile->whatsapp      = '089694913747';
        $profile->save();

        $user = new User;
        $user->name             = 'Norris Dwi Rahman';
        $user->email            = 'norisrahman@outlook.com';
        $user->password         = Hash::make('5009201138');
        $user->verified         = TRUE;
        $user->student_number   = '5009201138';
        $user->batch            = '2020';
        $user->roles            = 'Admin';
        $user->save();
        $getId = $user->id;
        $profile = new Profile;
        $profile->user_id       = $getId;
        $profile->university    = 'Institut Teknologi Sepuluh Nopember';
        $profile->major         = 'Teknik Fisika';
        $profile->line_id       = 'noris_rahman';
        $profile->whatsapp      = '085707303836';
        $profile->save();

        $user = new User;
        $user->name             = 'Mohamad Vikry Athari';
        $user->email            = 'vikry.a180701@gmail.com';
        $user->password         = Hash::make('5009201124');
        $user->verified         = TRUE;
        $user->student_number   = '5009201124';
        $user->batch            = '2020';
        $user->roles            = 'Admin';
        $user->save();
        $getId = $user->id;
        $profile = new Profile;
        $profile->user_id       = $getId;
        $profile->university    = 'Institut Teknologi Sepuluh Nopember';
        $profile->major         = 'Teknik Fisika';
        $profile->line_id       = 'vikryath';
        $profile->whatsapp      = '0895638073444';
        $profile->save();

        $user = new User;
        $user->name             = 'Nuzulul Syaqawati Azzahra';
        $user->email            = 'nuzululxzahra@gmail.com';
        $user->password         = Hash::make('5009201150');
        $user->verified         = TRUE;
        $user->student_number   = '5009201150';
        $user->batch            = '2020';
        $user->roles            = 'Admin';
        $user->save();
        $getId = $user->id;
        $profile = new Profile;
        $profile->user_id       = $getId;
        $profile->university    = 'Institut Teknologi Sepuluh Nopember';
        $profile->major         = 'Teknik Fisika';
        $profile->line_id       = 'ahlidebus';
        $profile->whatsapp      = '081357910872';
        $profile->save();

        $user = new User;
        $user->name             = 'Nabbil Gibran Winitaris Entyo';
        $user->email            = 'nabbilgibranwe@gmail.com';
        $user->password         = Hash::make('02311940000042');
        $user->verified         = TRUE;
        $user->student_number   = '02311940000042';
        $user->batch            = '2019';
        $user->roles            = 'Admin';
        $user->save();
        $getId = $user->id;
        $profile = new Profile;
        $profile->user_id       = $getId;
        $profile->university    = 'Institut Teknologi Sepuluh Nopember';
        $profile->major         = 'Teknik Fisika';
        $profile->line_id       = 'nabbilgibranwe';
        $profile->whatsapp      = '082234666582';
        $profile->save();
    }
}
