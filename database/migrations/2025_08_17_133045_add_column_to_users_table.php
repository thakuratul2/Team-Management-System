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
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('organization')->nullable()->unique()->index();
            $table->string('designation')->nullable()->index();
            $table->string('department')->unique()->nullable()->index();
            $table->string('phone_number')->unique()->nullable()->index();
            $table->text('address')->nullable()->index();
            $table->string('state')->nullable()->index();
            $table->string('country')->nullable()->index();
            $table->string('zip_code')->nullable()->index();
            $table->string('language')->nullable()->index();
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn([
                'organization',
                'designation',
                'department',
                'phone_number',
                'address',
                'state',
                'country',
                'zip_code',
                'language'
            ]);
        });
    }
};
