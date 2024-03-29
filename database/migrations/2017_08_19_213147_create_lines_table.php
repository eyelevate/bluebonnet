<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // public function up()
    // {
    //     Schema::create('lines', function (Blueprint $table) {
    //         $table->increments('id');
    //         $table->string('name');
    //         $table->text('desc')->nullable();
    //         $table->boolean('active')->default(0);
    //         $table->tinyInteger('status')->default(1);
    //         $table->softDeletes();
    //         $table->timestamps();
    //     });
    // }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lines');
    }
}
