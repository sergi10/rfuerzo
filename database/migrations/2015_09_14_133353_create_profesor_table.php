<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfesorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('profesor')) {
            Schema::drop('profesor');
        }
        Schema::create('profesor', function (Blueprint $table) {
            // 'nombre','apellidos','mail','user','pass','avatar', 'f-nac', 'centro_id'
            $table->increments('id');
            $table->string('nombre', 255);
            $table->string('apellidos', 255);
            $table->string('mail', 255)->unique();
            $table->string('user', 255);
            $table->string('pass', 255);
            $table->binary('avatar', 255)->nullable();
            $table->date('nacimiento', 255);
            $table->integer('centro_id')->unsigned();
            // Foreing Key
            $table->foreign('centro_id')
                    ->references('id')->on('centro')
                    ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('profesor');
    }
}
