<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->tinyInteger('type');
            $table->integer('company_id');
            $table->integer('category_id');
            $table->time('time_begin')->nullable();
            $table->time('time_end')->nullable();
            $table->date('day_begin')->nullable();
            $table->date('day_end')->nullable();
            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stocks');
    }
}
