<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->string('description')->nullable();
            $table->string('store_name')->nullable();
            $table->date('date')->nullable();
            $table->float('value');
            $table->foreignId('store_id')->nullable();
            $table->foreignId('origin_id');
            $table->foreignId('wallet_id');
            $table->foreignId('user_id');
            $table->boolean('is_installments');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('purchases');
    }
};
