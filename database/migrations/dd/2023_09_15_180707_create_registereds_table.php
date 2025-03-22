<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegisteredsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registereds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('branch_id')->index(); 
            $table->unsignedBigInteger('academy_id')->index(); 
            $table->unsignedBigInteger('programe_id')->index(); 


            $table->string('name');
            $table->string('nationality');
            $table->date('birth_date');
            $table->string('phone');
            $table->string('email');
             $table->date('reg_date');
            $table->string('address');
            $table->boolean('status')->nullable();

 
            $table->timestamps();
            $table->foreign('branch_id')->references('id')->on('branches')->cascadeOnDelete();
            $table->foreign('academy_id')->references('id')->on('academies')->cascadeOnDelete();
            $table->foreign('programe_id')->references('id')->on('programs')->cascadeOnDelete();
            


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registereds');
    }
}
