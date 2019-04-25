<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\User::create([
            'name'=>'tony kioko',
            'email'=>'tonyk@g.com',
            'password'=>bcrypt('12345678'),
            'admin'=>1,

        ]);

        App\Profile::create([
            'user_id' => $user->id,
            'avatar'=>'uploads/avatars/soft.jpg',
            'about' =>'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eveniet tempore exercitationem dignissimos eligendi distinctio? Cupiditate minima deleniti quas dignissimos consectetur!',
            'facebook'=>'facebook.com',
            'youtube'=>'youtube.com',

        ]);
    }
}
