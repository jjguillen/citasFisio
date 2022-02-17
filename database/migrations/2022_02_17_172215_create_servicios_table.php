<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('servicios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('servicio');
            $table->string('imagen');
            $table->timestamps();
        });
        /*
        //Modificar la tabla añadiéndole una nueva columna (habría que comentar lo de arriba y migrate)
        Schema::table('servicios', function (Blueprint $table) {
            $table->string('imagen');
        });
        */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servicios');
    }
};
