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
        Schema::create('holidays', function (Blueprint $table) {
            $table->id();

            // `company_id` bigint(20) unsigned NOT NULL,
            // `name` varchar(191) NOT NULL,
            // `year` int(11) NOT NULL,
            // `month` int(11) NOT NULL,
            // `date` date NOT NULL,
            // `is_weekend` tinyint(1) NOT NULL DEFAULT 0,

            $table->bigInteger('company_id')->constrained('companies')->onDelete('cascade');
            $table->string('name');
            $table->integer('year');
            $table->integer('month');
            $table->date('date');
            $table->boolean('is_weekend')->default(0);
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('holidays');
    }
};
