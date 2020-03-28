<?php

use Illuminate\Database\Seeder;

class ItemListTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\ItemList', 20)->create();
    }
}
