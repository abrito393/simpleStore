<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         if (!Schema::hasTable('user_types')) {
             Schema::create('user_types', function (Blueprint $table) {
                 $table->bigIncrements('id');
                 $table->string('name')->nullable();
                 $table->string('cod')->nullable();
                 $table->enum('type', ['admin','client'])->default('client');
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
         Schema::dropIfExists('user_types');
     }
}
