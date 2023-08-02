<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReporteFallasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reporte_fallas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onUpdate('cascade');
            $table->string('tipo_vehiculo');
            $table->string('linea');
            $table->string('modelo');
            $table->string('Kilometraje');
            $table->string('marca');
            $table->string('cilindraje');
            $table->string('tipo_combustible');
            $table->string('transmision');
            $table->string('direccion');
            $table->string('descripcionusuario_falla');
            $table->string('nombre_falla');
            $table->string('diagnostico_falla');
            $table->string('sistema_falla');
            $table->string('tipo_sistema');
            $table->string('elemento_falla');
            $table->string('descripcion_reparacion');
            $table->string('gragacion_principal', 1024);
            $table->string('ubicacion_grabacionprincipal');
            $table->string('gragacion_2', 1024)->nullable();
            $table->string('ubicacion_grabacion2')->nullable();          
            $table->string('gragacion_3', 1024)->nullable();
            $table->string('ubicacion_grabacion3')->nullable();
            $table->string('gragacion_4', 1024)->nullable();
            $table->string('ubicacion_grabacion4')->nullable();
            $table->string('gragacion_5', 1024)->nullable();
            $table->string('ubicacion_grabacion5')->nullable();
            $table->string('estado');
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
        Schema::dropIfExists('reporte_fallas');
    }
}
