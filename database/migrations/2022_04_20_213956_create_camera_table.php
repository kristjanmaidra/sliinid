<?php

use App\Models\Harbour;
use App\Models\Location;
use App\Models\SwitchBoard;
use App\Models\Switche;
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
            $table->string('image')->nullable();
            $table->string('view_angle');
            $table->foreignId('switche_id');
            $table->foreignId('location_id');
            $table->foreignId('switchboard_id');
            $table->foreignId('harbour_id');
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
