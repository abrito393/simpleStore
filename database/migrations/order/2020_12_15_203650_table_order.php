<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
        if (!Schema::hasTable('orders')) {
            Schema::create('orders', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->enum('status', ['pending','cancelled','approved'])->default('pending');
                $table->unsignedBigInteger('user_id')->nullable();
                $table->unsignedBigInteger('payment_method_id')->nullable();
                $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
                $table->foreign('payment_method_id')->references('id')->on('payments_methods')->onUpdate('cascade');
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
        Schema::dropIfExists('orders');
     }
}
