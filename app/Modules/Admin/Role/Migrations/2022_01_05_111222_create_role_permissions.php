<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolePermissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_permissions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('role_id')->unsigned()->constrained();
            $table->foreignId('permission_id')->unsigned()->constrained();

            //$table->integer('role_id')->unsigned();
            //$table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');

            //$table->integer('permission_id')->unsigned();
            //$table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('role_user', function (Blueprint $table) {
            $table->increments('id');

            $table->foreignId('role_id')->unsigned()->constrained();
            $table->foreignId('user_id')->unsigned()->constrained();
            //$table->bigInteger('user_id')->unsigned()->nullable();
            //$table->integer('role_id')->unsigned()->nullable();

            //$table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            //$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_permissions');
    }
}
