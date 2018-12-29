<?php

use Illuminate\Database\Seeder;

class LanguagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->insert([
            'lang_name' => 'Русский',
            'identif' => 'ru',
            'image' => 'russian.png',
            'folder' => 'ru',
            'template' => '0',
            'default' => '1',
            'locale' => 'ru_RU',
        ]);

        DB::table('languages')->insert([
            'lang_name' => 'Latviešu',
            'identif' => 'lv',
            'image' => 'latvian.png',
            'folder' => 'lv',
            'template' => '0',
            'default' => '0',
            'locale' => 'lv_LV',
        ]);

        DB::table('languages')->insert([
            'lang_name' => 'English',
            'identif' => 'en',
            'image' => 'english.png',
            'folder' => 'en',
            'template' => '0',
            'default' => '0',
            'locale' => 'en_EN',
        ]);

    }
}
