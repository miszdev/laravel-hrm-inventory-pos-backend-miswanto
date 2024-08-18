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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();

            // `name` varchar(191) NOT NULL,
            // `email` varchar(191) DEFAULT NULL,
            // `phone` varchar(191) DEFAULT NULL,
            // `website` varchar(191) DEFAULT NULL,
            // `logo` varchar(191) DEFAULT NULL,
            // `address` varchar(1000) DEFAULT NULL,
            // `status` varchar(191) NOT NULL DEFAULT 'active',
            // `total_users` int(11) NOT NULL DEFAULT '1',
            // `clock_in_time` time DEFAULT '08:00:00',
            // `clock_out_time` time DEFAULT '17:00:00',
            // `allow_clock_in_time` int(11) DEFAULT NULL,
            // `allow_clock_out_time` int(11) DEFAULT NULL,
            // `self_clocking` tinyint(1) NOT NULL DEFAULT '1',
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('website')->nullable();
            $table->string('logo')->nullable();
            $table->string('address')->nullable();
            $table->string('status')->default('active');
            $table->integer('total_users')->default(1);
            $table->time('clock_in_time')->default('08:00:00');
            $table->time('clock_out_time')->default('17:00:00');
            $table->integer('early_clock_in_time')->nullable();
            $table->integer('allow_clock_out_till')->nullable();
            $table->boolean('self_clocking')->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
