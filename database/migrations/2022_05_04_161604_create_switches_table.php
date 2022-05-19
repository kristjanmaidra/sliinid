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
            $table->binary('ip');
            $table->string('model');
            $table->string('ports');
            $table->string('switch_ports'); //parent switch
            $table->string('devices'); //switchi ühendatud seadmed
            $table->string('username'); //switchi kasutaja
            $table->string('password'); //switchi parool
            $table->string('image')->nullable();
            $table->text('description');
            $table->foreignIdFor(SwitchBoard::class)->constrained();
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
