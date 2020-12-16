<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TablePost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('posts')) {
            Schema::create('posts', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('userId');
                $table->string('title')->nullable();
                $table->text('body')->nullable();
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
    Schema::dropIfExists('posts');
    }
}
