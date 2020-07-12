<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('url')->unique()->index();
            $table->string('hits');
            $table->string('hosts');
            $table->double('balance');
            $table->unsignedInteger('time');
            $table->unsignedInteger('uniqueip');
            $table->unsignedInteger('impfrom');
            $table->unsignedInteger('impto');
            $table->unsignedInteger('hourlimit');
            $table->unsignedInteger('daylimit');
            $table->unsignedInteger('user_id');
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
        Schema::dropIfExists('sites');
    }
}
