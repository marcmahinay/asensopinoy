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
            $table->unsignedBigInteger('asenso_id');
            $table->string('lastname');
            $table->string('firstname');
            $table->string('middlename');
            $table->date('birthdate');
            $table->string('sex');
            $table->string('civil_status');
            $table->string('blood_type');
            $table->foreignIdFor(Barangay::class);
            $table->string('address');
            $table->string('mobile_no');
            $table->string('email');
            $table->string('contact_person');
            $table->string('contact_address');
            $table->string('contact_mobile');
            $table->tinyInteger('status')->default(1);
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
