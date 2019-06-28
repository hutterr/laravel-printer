<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Németh Ervin',
            'email' =>'nemeth.ervin@masterpartner.hu',
            'password' => bcrypt('ervin1'),
            'jog' => 'user',
        ]);
        DB::table('users')->insert([
            'name' => 'Woditsch Gábor',
            'email' =>'woditsch.gabor@masterpartner.hu',
            'password' => bcrypt('gabor2'),
            'jog' => 'user',
        ]);
        DB::table('users')->insert([
            'name' => 'Szentes Tmás',
            'email' =>'szentes.tamas@masterpartner.hu',
            'password' => bcrypt('tamas3'),
            'jog' => 'user',
        ]);
        DB::table('users')->insert([
            'name' => 'Dolmány Anett',
            'email' =>'dolmany.anett@masterpartner.hu',
            'password' => bcrypt('anett3'),
            'jog' => 'user',
        ]);
        DB::table('users')->insert([
            'name' => 'Varga Csaba',
            'email' =>'varga.csaba@masterpartner.hu',
            'password' => bcrypt('csaba4'),
            'jog' => 'user',
        ]);
        DB::table('users')->insert([
            'name' => 'Hutter Róbert',
            'email' =>'hutter.robert@masterpartner.hu',
            'password' => bcrypt('adminRobi'),
            'jog' => 'admin',
        ]);
    }
}
