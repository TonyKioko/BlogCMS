<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Setting::create([
            'site_name'=>"XYZ Blog",
            'contact_number'=>'12345678',
            'contact_email'=>'abc@blog.com',
            'address'=>'1234 X Street'
        ]);
    }
}
