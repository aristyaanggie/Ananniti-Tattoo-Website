<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('artist_id')->nullable()->constrained('artist_profiles')->nullOnDelete()->cascadeOnUpdate();
            $table->enum('service_type', ['studio', 'home_service', 'consultation']);
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone', 20);
            $table->date('booking_date');
            $table->time('booking_time')->nullable();
            $table->text('design_description')->nullable();
            $table->string('placement', 100)->nullable();
            $table->string('size', 100)->nullable();
            $table->enum('status', ['pending', 'confirmed', 'completed', 'cancelled'])->default('pending');
            $table->timestamp('whatsapp_sent_at')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->index('user_id');
            $table->index('artist_id');
            $table->index('status');
            $table->index('booking_date');
            $table->index(['status', 'booking_date']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
