<?php

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = collect([]);

        $en = new \StdClass;
        $en->iso_code = 'en';
        $en->name = 'English';
        $languages->push($en);

        $zu = new \StdClass;
        $zu->iso_code = 'zu';
        $zu->name = 'Zulu';
        $languages->push($zu);

        $st = new \StdClass;
        $st->iso_code = 'st';
        $st->name = 'Sesotho';
        $languages->push($st);


        foreach($languages as $language) {
            Language::create([
                'name' => $language->name,
                'iso_code' => $language->iso_code,
            ]);
        }
    }
}
