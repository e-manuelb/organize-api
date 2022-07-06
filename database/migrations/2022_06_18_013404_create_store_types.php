<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Database\Seeders\AddTypesToStoreTypes;

return new class extends Migration {
    public function up()
    {
        Schema::create('store_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        (new AddTypesToStoreTypes())->run();
    }

    public function down()
    {
        Schema::dropIfExists('store_types');
    }
};
