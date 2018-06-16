<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkUserToImagenesUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('imagenes_usuarios', function (Blueprint $table) {
              $table->integer('fk_own_user')->unsigned()->nullable()->after('id');
             $table->foreign('fk_own_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('imagenes_usuarios', function (Blueprint $table) {
              $table->dropForeign(['fk_own_user']);
              $table->dropColumn('fk_own_user');
        });
    }
}
