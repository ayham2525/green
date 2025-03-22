<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('academy_id')->index();

            $table->string('programe_name');
            $table->integer('classes');
            $table->integer('days');
            $table->double('price');




            $table->string('from_sunday')->nullable();
            $table->string('to_sunday')->nullable();


            
            $table->string('from_monday')->nullable();
            $table->string('to_monday')->nullable();

 


            
            $table->string('from_tuesday')->nullable();
            $table->string('to_tuesday')->nullable();


                       
            $table->string('from_wednesday')->nullable();
            $table->string('to_wednesday')->nullable();



            
            $table->string('from_thursday')->nullable();
            $table->string('to_thursday')->nullable();



            
            $table->string('from_friday')->nullable();
            $table->string('to_friday')->nullable();



            
            $table->string('from_saturday')->nullable();
            $table->string('to_saturday')->nullable();





      
            $table->timestamps();
            $table->foreign('academy_id')->references('id')->on('academies')->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programs');
    }
}
