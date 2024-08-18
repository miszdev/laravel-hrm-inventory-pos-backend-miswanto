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
        Schema::create('leaves', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('leave_type_id')->constrained('leave_types')->onDelete('cascade');
            //company_id
            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade');
            //start_date
            $table->date('start_date');
            //end_date
            $table->date('end_date')->nullable();
            //total_days
            $table->integer('total_days')->default(1);
            //is half day
            $table->boolean('is_half_day')->default(0);
            //reason
            $table->text('reason')->nullable();
            //is_paid
            $table->boolean('is_paid')->default(1);
            //status
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leaves');
    }
};
