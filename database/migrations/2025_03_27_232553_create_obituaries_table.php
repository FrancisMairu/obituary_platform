<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obituaries', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->date('date_of_birth');
            $table->date('date_of_death');
            $table->text('content');
            $table->string('author', 100);
            $table->dateTime('submission_date')->useCurrent();
            $table->string('slug')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('obituaries');
    }
};