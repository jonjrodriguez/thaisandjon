<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRsvpsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rsvps', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
			$table->string('email')->nullable();
			$table->string('phone')->nullable();
			$table->boolean('attending')->default(0);
			$table->integer('guests');
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
        Schema::drop('rsvps');
    }

}
