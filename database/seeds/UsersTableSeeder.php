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
        $janine = new \App\User;
        $janine->name = 'Janine';
        $janine->email = 'jhempy@gmail.com';
        $janine->password = bcrypt('secret');
        $janine->save();

        $bob = new \App\User;
        $bob->name = "Bob";
        $bob->email = 'bob@bob.bob';
        $bob->password = bcrypt('secret');
        $bob->save();
    }
}
