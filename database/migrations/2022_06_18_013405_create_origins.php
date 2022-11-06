<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('origins', function (Blueprint $table) {
            $table->id();
            $table->string('name', 256);
            $table->foreignId('user_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('origins');
    }
};
