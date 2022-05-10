<?php

use App\Models\Switches;
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
        // if (!Schema::hasTable('cameras')) {

        Schema::create('cameras', function (Blueprint $table) {
            $table->id();
            $table->integer('ip');
            $table->string('name');
            $table->string('model');
            $table->string('username');
            $table->string('password');
            $table->string('location');
            $table->string('image')->nullable();
            $table->string('view_angle');
            $table->foreignId(Switches::class);
            $table->integer('focus_distance');
            $table->decimal('price');
            $table->text('description');
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
        Schema::dropIfExists('cameras');
    }
};
