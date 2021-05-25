<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('buckets')) return; 
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string("name");
         
            $table->integer('bucket_id')->nullable()->unsigned();
            $table->foreign('bucket_id')
            ->references('id')->on('buckets')
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
        Schema::dropIfExists('files');
    }
}
