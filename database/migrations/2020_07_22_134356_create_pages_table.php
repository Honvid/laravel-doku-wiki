<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->default('')->comment('Page Title');
            $table->integer('book_id')->default('0')->comment('Book');
            $table->integer('parent_id')->default('0')->comment('Parent');
            $table->text('content')->comment('Page Content');
            $table->text('desc')->nullable()->comment('Desc');
            $table->integer('order')->comment('Order');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
