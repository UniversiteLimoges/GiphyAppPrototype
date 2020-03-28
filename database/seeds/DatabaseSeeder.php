<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

 /*
    Seeder
        php artisan db:seed
    Recommencer seed
        php artisan migrate:refresh --seed
*/

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Quentin
        DB::table('Users')->insert([
            'name' => 'Quentin',
            'email' => 'quentin.vinot.tic@gmail.com	',
            'password' => bcrypt('quentin'),
            'role' => 'admin'
        ]);
        
        // Tony
        DB::table('Users')->insert([
            'name' => 'Tony Bengué',
            'email' => 'tonybengue@hotmail.fr',
            'password' => bcrypt('Lethilie1'),
            'role' => 'admin'
        ]);

        // Gael
        DB::table('Users')->insert([
            'name' => 'Gael',
            'email' => 'gael@hotmail.fr',
            'password' => bcrypt('gael'),
        ]);

        // Thibault
        DB::table('Users')->insert([
            'name' => 'Thibault',
            'email' => 'thibault@hotmail.fr',
            'password' => bcrypt('thibault'),
        ]);

        // $this->call(UsersTableSeeder::class);
        $this->command->info('User table seeded !');
    }
}
