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
    	/* Escolhe e insere em uma tabela */
//         \DB::table('users')->insert( 
//         	[
//         	'name' => "Administrator",
//	         'email' => 'admin@admin.com',
//	         'email_verified_at' => now(),
//	         'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
//	         'remember_token' => "sdadasdada",
//         	]
//         );

        factory(\App\User::class, 40)->create()->each(function($user) {
            // Automáticamente o store.id_user será preenchido com o id de user...
            $user->store()->save(factory(\App\Store::class)->make());
            // O save() trabalha com objetos o create() com arrays...
        });
    }
}
