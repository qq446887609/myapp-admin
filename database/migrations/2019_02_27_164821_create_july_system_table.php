<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJulySystemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('july_system', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',60)->default('玉水明沙');
            $table->string('desc',255)->default('玉水明沙');
            $table->string('keywords',255)->default('玉水明沙');
            $table->string('footer',255)->default('玉水明沙');
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
        Schema::dropIfExists('july_system');
    }
}
