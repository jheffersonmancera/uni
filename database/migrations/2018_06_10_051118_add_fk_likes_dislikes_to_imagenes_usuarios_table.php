<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkLikesDislikesToImagenesUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('likes_dislikes', function (Blueprint $table) {
              $table->integer('fk_imagenes_usuarios')->unsigned()->nullable()->after('fk_user');
             $table->foreign('fk_imagenes_usuarios')->references('id')->on('imagenes_usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('likes_dislikes', function (Blueprint $table) {
              $table->dropForeign(['fk_imagenes_usuarios']);
              $table->dropColumn('fk_imagenes_usuarios');
        });
    }
}
