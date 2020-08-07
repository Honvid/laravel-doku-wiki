<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->index()->default('')->comment('Name');
            $table->string('author')->comment('Author');
            $table->string('cover')->comment('Cover');
            $table->text('desc')->comment('Description');
            $table->integer('order')->default('0')->comment('Order');
            $table->integer('page_count')->default('0')->comment('Page Count');
            $table->integer('edit_count')->default('0')->comment('Edit Count');
            $table->integer('view_count')->default('0')->comment('View Count');
            $table->integer('comment_count')->default('0')->comment('Comment Count');
            $table->integer('last_modify_by')->default('0')->comment('Last Modify');
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
        Schema::dropIfExists('books');
    }
}
