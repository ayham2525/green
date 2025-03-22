<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uniforms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('branch_id')->index(); 
            $table->unsignedBigInteger('academy_id')->index(); 
            $table->unsignedBigInteger('registerd_id')->index(); 


            $table->string('size');
            $table->string('bag');
            $table->string('uniform');
            $table->string('branch_status');
            $table->string('office_status');
            $table->string('note')->nullable();



            $table->timestamps();
            $table->foreign('branch_id')->references('id')->on('branches')->cascadeOnDelete();
            $table->foreign('academy_id')->references('id')->on('academies')->cascadeOnDelete();
            $table->foreign('registerd_id')->references('id')->on('registereds')->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uniforms');
    }
}
