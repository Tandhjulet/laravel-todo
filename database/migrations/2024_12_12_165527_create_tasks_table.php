<?php

use App\Models\User;
use App\Enums\TaskPriority;
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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
			// Max length is 255 chars (1/4 with utf8 chars as they occupy up to 4 bytes)
			$table->tinyText("name");
			$table->timestamp("at");
			$table->mediumText("description");
			$table->enum("type", array_column(TaskPriority::cases(), 'value'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
