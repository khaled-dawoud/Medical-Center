<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('profile_image')->nullable();
            $table->string('major');
            $table->string('address');
            $table->date('available');
            $table->string('price');
            $table->foreignId('clinic_id')->nullable();
            $table->text('about_me');
            $table->string('clinic_center');
            $table->string('clinic_major');
            $table->string('clinic_address');
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
        Schema::dropIfExists('doctors');
    }
};
