<?php

use App\Models\SwitchBoard;
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
        Schema::create('switches', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('ip');
            $table->string('model');
            $table->string('image')->nullable();
            $table->text('description');
            $table->foreignId('swithboard_id');
            $table->foreignId('location_id');
            $table->foreignId('harbour_id');
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
        Schema::dropIfExists('switches');
    }
};
