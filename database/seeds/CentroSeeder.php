<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use App\Centro;

class CentroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        DB::table('centro')->delete();

        $faker = Faker::create('es_ES');
        for ($i=0; $i<=5; $i++){
 			DB::table('centro')->insert(array(
 					'nombre' => 'IES ' . $faker->name,
 					'direccion' => $faker->streetAddress . ' , ' . $faker->postcode . ' , ' . $faker->city . ' , ' . $faker->state

 				));
        }
        	// \Session::flash('message', 'El Centro ' . $centro->nombre . ' ha sido creado!');
        	$this->command->info('La tabla centro ha sido poblada OK');
        
    }
}
