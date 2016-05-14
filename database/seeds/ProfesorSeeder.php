<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use App\Profesor;

class ProfesorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// 'nombre','apellidos','mail','user','pass','avatar', 'nacimiento', 'centro_id', 'enlace_avatar')
        DB::table('profesor')->delete();

        $faker = Faker::create('es_ES');
        for ($i=0; $i<=15; $i++){
        	// $img = file_get_contents($faker->imagerUrl($width = 200, $height = 480, 'abstract'));
        	$img = file_get_contents('http://lorempixel.com/400/400/abstract');
        	$username = $faker->userName;
        	$fileName = str_random(7).'_'.$username.'.jpg';
        	$last_id_centro =  \DB::table('centro')->first();
			$first_id = $last_id_centro->id;
 			DB::table('profesor')->insert(array(
 					'nombre' 	=>  $faker->firstname,
 					'apellidos' => $faker->lastname . ' ' . $faker->lastname,
 					'mail' 		=> $faker->safeEmail,
 					'user'		=> $username,
 					// 'pass' 		=> $faker->password,
 					'pass' 		=> App::make('hash')->make($username),
 					// 'avatar' 	=> $fileName,
 					'nacimiento'=> $faker->dateTimeBetween($startDate = '-60 years', $endDate = '-26 years'),
 					'centro_id' => $faker->numberBetween($min=$first_id, $max=$first_id + 5),
 					'enlace_avatar' => $fileName,

 				));
 			file_put_contents("public/images/avatares/$fileName", $img);
        }
        	// \Session::flash('message', 'El Centro ' . $centro->nombre . ' ha sido creado!');
        	$this->command->info('La tabla profesor ha sido poblada OK');
        
    }
}
