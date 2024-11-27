<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("SET SQL_MODE='ALLOW_INVALID_DATES';");
        Schema::table('users', function (Blueprint $table) {
            $table->string('reference_code')->nullable()->unique('user_reference_code_UNIQUE')->after('id');
            $table->boolean('is_admin')->default(false)->after('password');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("SET SQL_MODE='ALLOW_INVALID_DATES';");
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('is_admin');
        });
    }
};
