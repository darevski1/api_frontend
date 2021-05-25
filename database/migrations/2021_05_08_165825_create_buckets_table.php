<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBucketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('buckets')) return; 
        Schema::create('buckets', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            
            $table->integer('location_id')->nullable()->unsigned();
            $table->foreign('location_id')
            ->references('id')->on('locations')
            ->onDelete('cascade');

            
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
        Schema::dropIfExists('buckets');
    }
}
