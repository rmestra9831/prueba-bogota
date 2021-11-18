<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesAndPermissionsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id('id');
            $table->string('nombre');
            $table->timestamps();
        });

        Schema::create('role_usuario', function (Blueprint $table) {
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('permisos', function (Blueprint $table) {
            $table->id('id');
            $table->string('permiso');
            $table->timestamps();
        });

        Schema::create('roles_permisos', function (Blueprint $table) {
            $table->foreignId('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->foreignId('permiso_id')->references('id')->on('permisos')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('permisos_usuario', function (Blueprint $table) {
            $table->foreignId('usuario_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('permiso_id')->references('id')->on('permisos')->onDelete('cascade');
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
        Schema::table('roles', function (Blueprint $table) {
            //
        });
        Schema::table('role_usuario', function (Blueprint $table) {
            //
        });
    }
}
