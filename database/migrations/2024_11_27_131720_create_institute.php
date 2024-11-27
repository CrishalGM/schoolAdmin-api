<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reference_code')->nullable()->unique('school_reference_code_UNIQUE');
            $table->string('name');
            $table->text('description', 65535);
            $table->string('email')->nullable();
            $table->string('phone');
            $table->string('address');
            $table->string('city');
            $table->string('postal_code');
            $table->string('street')->nullable();
            $table->string('website')->nullable();
            $table->integer('country_id')->unsigned()->index('institute_country_id_foreign');
            $table->integer('parent_id')->unsigned()->nullable()->index('institute_parent_id_foreign');
            $table->float('latitude', 10, 0)->nullable();
            $table->float('longitude', 10, 0)->nullable();
            $table->text('opening_hours')->nullable();
            $table->unsignedInteger('governance_body_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('governance_body_id')->references('id')->on('governance_bodies');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schools');
    }
};
