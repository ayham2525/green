<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstalmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instalments', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('branch_id')->index(); 
            $table->unsignedBigInteger('academy_id')->index(); 
            $table->unsignedBigInteger('registerd_id')->index(); 
 
            $table->date('payment_date');
            $table->date('start_date');
            $table->date('end_date');
            $table->double('amount');
            $table->double('discount')->nullable();
            $table->double('still')->nullable();
            $table->string('pay_method');

            $table->string('note')->nullable();;







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
        Schema::dropIfExists('instalments');
    }
}
