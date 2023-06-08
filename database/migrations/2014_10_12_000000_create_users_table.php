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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('document_type');
            $table->string('document_number')->unique();
            $table->string('cellphone_number');
            $table->string('email')->unique();
            $table->string('password');            
            $table->rememberToken();
            $table->foreignId('role')->nullable();
            $table->foreignId('id_tc')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->boolean('active');
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
        Schema::dropIfExists('users');
    }
};
