<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagenesUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagenes_usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user_created')->nullable();
            $table->integer('id_user_updated')->nullable();
            $table->string('src_imagen')->nullable();;
             $table->integer('like')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('imagenes_usuarios');
    }
}
