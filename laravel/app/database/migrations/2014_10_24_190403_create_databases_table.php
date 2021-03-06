<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDatabasesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dbases', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name_db');
            $table->string('user');
            $table->integer('domain_id')->unsigned();
            $table->foreign('domain_id')->references('id')->on('domains')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('dbases');
    }

}
