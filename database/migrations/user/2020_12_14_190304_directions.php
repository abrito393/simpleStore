<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Directions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
        if (!Schema::hasTable('address')) {
            Schema::create('address', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->text('address')->nullable();
                $table->unsignedBigInteger('user_id')->nullable();
                $table->enum('status', ['active','inactive'])->default('active');
                $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
                $table->timestamps();
                $table->softDeletes('deleted_at', 0);
            });
        }
     }
 
     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::dropIfExists('address');
     }
}
