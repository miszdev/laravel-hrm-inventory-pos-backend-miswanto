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
        Schema::create('shifts', function (Blueprint $table) {
            $table->id();

            // `company_id` bigint(20) unsigned NOT NULL,
            // `name` varchar(191) NOT NULL,
            // `clock_in_time` time NOT NULL,
            // `clock_out_time` time NOT NULL,
            // `late_mark_after` int(11) NOT NULL,
            // `early_clock_in_time` int(11) NOT NULL,
            // `allow_clock_out_till` int(11) NOT NULL,

            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade');
            $table->string('name');
            $table->time('clock_in_time');
            $table->time('clock_out_time');
            $table->integer('late_mark_after')->nullable();
            $table->integer('early_clock_in_time')->nullable();
            $table->integer('allow_clock_out_till')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shifts');
    }
};
