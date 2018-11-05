<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Primeiro comando para zerar a table antes de criar novos dados
         * e inclusão de um usuario aleatorio
         * 
         * para incluir manual seria algo semelhante a isso
         * 
         * $users = [
         * 0 => [
         *      'name' => 'nome',
         * ],
         * 1 => [
         *      'name' => 'nome2',
         * ]
         * ];
         * DB::table('users')->insert($users);
         * 
         * e no prompet rodar o php artisan db:seed
        */
        DB::table('users')->truncate();

        factory(App\User::class, 1)->create();
    }
}
