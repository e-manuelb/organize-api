<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Database\Seeders\AddRoles;

return new class extends Migration {
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name', 256);
            $table->timestamps();
        });

        (new AddRoles())->run();
    }

    public function down()
    {
        Schema::dropIfExists('roles');
    }
};
