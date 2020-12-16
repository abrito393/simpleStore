<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        if (!Schema::hasTable('products')) {
            Schema::create('products', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('name')->nullable();
                $table->string('description')->nullable();
                $table->float('price', 8, 2)->nullable();
                $table->string('photo')->nullable();
                $table->enum('status', ['available','inactive'])->default('available');
                $table->timestamp('expiration_at',0);
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
        Schema::dropIfExists('products');
    }
}
