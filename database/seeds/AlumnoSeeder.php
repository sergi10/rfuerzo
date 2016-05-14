<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use App\Alumno;

class AlumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //'nombre','apellidos','mail','user','pass','avatar', 'nacimiento',  'centro_id', 'enlace_avatar'
         DB::table('alumno')->delete();

        $faker = Faker::create('es_ES');
        for ($i=0; $i<=15; $i++){
            // $img = file_get_contents($faker->imagerUrl($width = 200, $height = 480, 'abstract'));
            $img = file_get_contents('http://lorempixel.com/400/400/cats');
            $username = $faker->userName;
            $fileName = str_random(7).'_'.$username.'.jpg';
            $last_id_centro =  DB::table('centro')->first();
			$first_id = $last_id_centro->id;
            DB::table('alumno')->insert(array(
                    'nombre'    => $faker->firstname,
                    'apellidos' => $faker->lastname . ' ' . $faker->lastname,
                    'mail'      => $faker->safeEmail,
                    'user'      => $username,
                    // 'pass'       => $faker->password,
                    'pass'      => App::make('hash')->make($username),
                    // 'avatar'     => $fileName,
                    'nacimiento'=> $faker->dateTimeBetween($startDate = '-30 years', $endDate = '-13years')->format('Y-m-d'),
                    // 'nacimiento'=> $faker->date($format = 'Y-m-d', $max = '-13 years'),
                    'centro_id' => $faker->numberBetween($min = $first_id, $max = $first_id  + 5),
                    'enlace_avatar' => $fileName,

                ));
            file_put_contents("public/images/avatares/$fileName", $img);
        }
            // \Session::flash('message', 'El Centro ' . $centro->nombre . ' ha sido creado!');
            $this->command->info('La tabla alumno ha sido poblada OK');
        
    }
}
