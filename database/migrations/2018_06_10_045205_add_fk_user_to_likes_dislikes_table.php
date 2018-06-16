<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkUserToLikesDislikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('likes_dislikes', function (Blueprint $table) {
              $table->integer('fk_user')->unsigned()->nullable()->after('id');
             $table->foreign('fk_user')->references('id')->on('users');
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
              $table->dropForeign(['fk_user']);
              $table->dropColumn('fk_user');
        });
    }
}
