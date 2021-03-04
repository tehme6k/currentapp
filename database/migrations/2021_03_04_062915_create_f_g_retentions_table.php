<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFGRetentionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('f_g_retentions', function (Blueprint $table) {
            $table->id();
            $table->integer('box_id');
            $table->integer('user_id');
            $table->integer('product_id');
            $table->string('lot');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
            $table->SoftDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('f_g_retentions');
    }
}
