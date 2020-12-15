<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'notes',
            function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->text('body')->nullable();
                $table->boolean('is_important')->default(false);
                $table->timestamps();
                $table->string('image')->nullable();

            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notes');
    }
}
