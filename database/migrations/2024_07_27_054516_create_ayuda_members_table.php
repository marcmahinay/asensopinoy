<?php

use App\Models\Ayuda;
use App\Models\Member;
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
        Schema::create('ayuda_members', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Ayuda::class);
            $table->foreignIdFor(Member::class);
            $table->date('date_availed')->nullable();
            $table->decimal('amount',9,2)->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ayuda_members');
    }
};
