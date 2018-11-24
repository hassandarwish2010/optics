<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ContactLensesImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_lenses_images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image');
            $table->unsignedInteger('contact_lenses_id')->nullable();
            $table->foreign('contact_lenses_id')->references('id')->on('contact_lenses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.contact_lenses
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('contact_lenses_images');
    }
}
