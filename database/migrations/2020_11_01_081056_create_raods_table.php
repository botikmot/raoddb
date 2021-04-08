<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRaodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('raods', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('serial');
            $table->string('office')->nullable();
            $table->string('allotclass')->nullable();
            $table->string('pap')->nullable();
            $table->string('activity');
            $table->string('uacscode');
            $table->string('name');
            $table->text('particular');
            $table->float('obligation', 12, 2);
            $table->float('disbursement', 12, 2)->nullable();
            $table->text('status')->nullable();
            $table->string('date')->nullable();
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
        Schema::dropIfExists('raods');
    }
}
