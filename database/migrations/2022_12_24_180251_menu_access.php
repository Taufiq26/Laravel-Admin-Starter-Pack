<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MenuAccess extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus_access', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('role_id')->nullable(false);
            $table->uuid('menu_id')->nullable(false);
            $table->integer('view')->default(0);
            $table->integer('create')->default(0);
            $table->integer('update')->default(0);
            $table->integer('delete')->default(0);
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
        Schema::dropIfExists('menu_access');
    }
}
