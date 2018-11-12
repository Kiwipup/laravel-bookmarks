<?php

use Illuminate\Database\Seeder;

class CataloguesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $catalogues = [
            ['Cat Photos', 'Cute kitties on the internet'],
            ['Recipes', 'Food to try out'],
            ['Books to Read', null]
        ];

        $bob = \App\User::where('name', 'Bob')->first();

        foreach ($catalogues as $catalogue) {

            $temp = new \App\Catalogue;
            $temp->user_id = $bob->id;
            $temp->name = $catalogue[0];
            $temp->description = $catalogue[1];
            $temp->save();

        }
    }
}
