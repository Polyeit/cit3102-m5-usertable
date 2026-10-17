<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_tables', function (Blueprint $table) {
			$table->id('UID');
			$table->string('UName');
			$table->integer('UAge');
			$table->string('UCity');
			$table->string('UEmail');   // <- add this
			$table->timestamps();
		});
    }

    public function down(): void
    {
        Schema::dropIfExists('user_tables');
    }
};
