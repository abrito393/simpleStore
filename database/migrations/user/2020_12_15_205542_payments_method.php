<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PaymentsMethod extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
        if (!Schema::hasTable('payments_methods')) {
            Schema::create('payments_methods', function (Blueprint $table) {
                $table->id();
                $table->string('name')->nullable();
                $table->string('type')->nullable();
                $table->string('number')->nullable();
                $table->string('cvv')->nullable();
                $table->integer('month_exp')->nullable();
                $table->integer('year_exp')->nullable();
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
        Schema::dropIfExists('payments_methods');
     }
}
