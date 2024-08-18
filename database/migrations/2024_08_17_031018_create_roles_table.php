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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();

            // `company_id` bigint(20) unsigned NOT NULL,
            // `name` varchar(191) NOT NULL,
            // `display_name` varchar(191) DEFAULT NULL,
            // `description` varchar(191) DEFAULT NULL,

            //foreign key to company table
            $table->foreignId('company_id')->constrained('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->string('name');
            $table->string('display_name')->nullable();
            $table->string('description')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
