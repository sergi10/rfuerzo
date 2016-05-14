<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use App\Mapa;

class MapaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //'titulo', 'descripcion', 'imagen', 'audio', 'enlace','enlace_audio', 'profesor_id')
         DB::table('mapa')->delete();

        $faker = Faker::create('es_ES');
        $last_id_profesor =  DB::table('profesor')->first();
		$first_id = $last_id_profesor->id;
        for ($i=0; $i<15; $i++){
			$profesor_id = $first_id + $i;
			$max = $faker->numberBetween($min = 4, $max = 15);
			// dd($fileName, $last_id_profesor, $first_id, $profesor_id, $max,$faker->words($nb = $faker->randomDigitNotNull),$faker->sentence($nbWords = $faker->numberBetween($min= 10, $max= 35)));
			for ($j=0; $j<$max; $j++){
				$img = file_get_contents('http://lorempixel.com/640/480/city');
            	$fileName = $faker->city.'_'.$faker->postcode.'.jpg';
	            DB::table('mapa')->insert(array(
	                    'titulo'    	=> $faker->sentence($nbWords = $faker->randomDigitNotNull),
	                    'descripcion' 	=> $faker->sentence($nbWords = $faker->numberBetween($min= 10, $max= 35)),
	                    'profesor_id' 	=> $profesor_id,
	                    'enlace'	 	=> $fileName,
	                ));
	            file_put_contents("public/images/mapas/$fileName", $img);
	        }
        }
            // \Session::flash('message', 'El Centro ' . $centro->nombre . ' ha sido creado!');
            $this->command->info('La tabla mapa ha sido poblada OK');
        
    }
}

