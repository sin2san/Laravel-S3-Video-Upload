<?php

use Illuminate\Database\Seeder;

class OptionTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('option')->delete();
        $option = array(
            array(
                'name'      => 'VideoHub',
                'phone'      => '+65 8246 9048',
                'email'      => 'info@genit.sg',
                'logo'      =>  'logo.png',
                'favicon'      =>  'favicon.png',
                'company_name' => 'Genit',
                'company_web_url' => 'https://genit.sg',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            )
        );
        DB::table('option')->insert( $option );

        Cache::forever('optionCache', \App\Option::first());
    }
}
