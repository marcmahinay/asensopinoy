<?php

use App\Models\Ayuda;
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
        Schema::create('ayuda_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Ayuda::class)
                  ->constrained()
                  ->onDelete('restrict'); // Prevent deletion of ayuda if it is referenced
            $table->date('schedule_date');
            $table->string('venue');
            $table->decimal('amount', 9, 2)->nullable();
            $table->text('notes')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ayuda_schedules');
    }
};
