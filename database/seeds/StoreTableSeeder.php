<?php

use Illuminate\Database\Seeder;

class StoreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stores = \App\Store::all(); // Pega todos os objetos...

        foreach ($stores as $store)
        {
        	$store->products()->save(factory(\App\Product::class)->make());
        }
    }
}
