<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntertainmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entertainments', function (Blueprint $table) {
            $table->id();
            $table->string('filename');
            $table->string('ruTitle');
            $table->string('tjTitle');
            $table->string('enTitle');
            $table->boolean('from_catalog');
            $table->string('subtitles')->nullable();
            $table->string('poster')->default('default.jpg');
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
        Schema::dropIfExists('entertainments');
    }
}
