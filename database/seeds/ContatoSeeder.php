<?php

use Illuminate\Database\Seeder;

class ContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Priemiro roda comando para zerar a table antes de criar novos dados
         * 
         * Existe duas formas de povoar, incluindo item a item (ex no userSeeder)
         * ou como o factory gera dados aleatorios usando o factory
         * exemplo usado aqui, onde gera 5 dados aleatorios para a tablea Contato
         */
        DB::table('contatos')->truncate();

        factory(App\ContatoModel::class, 5)->create();
    }
}
