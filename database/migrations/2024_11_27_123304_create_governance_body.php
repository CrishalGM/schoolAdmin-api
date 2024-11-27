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
        Schema::create('governance_bodies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reference_code')->nullable()->unique('governance_body_reference_code_UNIQUE');
            $table->string('name');
            $table->string('chairperson_name');
            $table->date('established_date')->nullable();
            $table->text('description', 65535);
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('postal_code')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('governance_bodies');
    }
};
