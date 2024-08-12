<?php

use App\Models\Barangay;
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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('asenso_id')->unique();
            $table->string('lastname');
            $table->string('firstname');
            $table->string('middlename');
            $table->string('birthdate_str')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('birthplace');
            $table->string('sex');
            $table->string('civil_status');
            $table->string('blood_type');
            $table->string('position');
            $table->string('profession');
            $table->foreignIdFor(Barangay::class)
                    ->constrained()
                    ->onDelete('restrict');
            $table->string('present_address');
            $table->string('mobile_no');
            $table->string('email')->nullable();
            $table->string('contact_person');
            $table->string('contact_address');
            $table->string('contact_mobile');
            $table->tinyInteger('status')->default(1);
            $table->string('image_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
