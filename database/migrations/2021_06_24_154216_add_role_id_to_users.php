<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRoleIdToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            /* Vamos a crear la FK con la tabla roles entonces,
            creo el campo role_id y lo enlaso con el id que esta en la tabla role y 
            dejamos la eliminación en cascada  */
            $table->foreign('rol_usercrm')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['rol_usercrm']);
            $table->dropColumn('rol_usercrm');
        });
    }
}
