<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Personne', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('nom')->charset('utf8');
            $table->string('prenom')->charset('utf8');
            $table->string('mail')->charset('utf8');
            $table->string('password')->charset('utf8');
            $table->unsignedInteger('role_id')->index();
            $table->unsignedInteger('campus_id')->index();
            //$table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Personne');
    }
}
