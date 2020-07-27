<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCountAttribute extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->integer('edit_count')->default(0)->comment('Edit Count');
            $table->integer('view_count')->default(0)->comment('View Count');
            $table->integer('comment_count')->default(0)->comment('Comment Count');

            $table->integer('last_modify_by')->default(0)->comment('Last Modify By');
            $table->timestamp('last_modify_at')->nullable()->comment('Last Modify Time');
        });

        Schema::table('books', function (Blueprint $table) {
            $table->integer('page_count')->default(0)->comment('Page Count');
            $table->integer('edit_count')->default(0)->comment('Edit Count');
            $table->integer('view_count')->default(0)->comment('View Count');
            $table->integer('comment_count')->default(0)->comment('Comment Count');

            $table->integer('last_modify_by')->default(0)->comment('Last Modify By');
            $table->timestamp('last_modify_at')->nullable()->comment('Last Modify Time');
        });

        Schema::table('authors', function (Blueprint $table) {
            $table->integer('page_count')->default(0)->comment('Page Count');
            $table->integer('book_count')->default(0)->comment('Edit Count');
            $table->integer('comment_count')->default(0)->comment('Comment Count');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->removeColumn('edit_count');
            $table->removeColumn('view_count');
            $table->removeColumn('comment_count');
            $table->removeColumn('last_modify_by');
            $table->removeColumn('last_modify_at');
        });

        Schema::table('books', function (Blueprint $table) {
            $table->removeColumn('page_count');
            $table->removeColumn('edit_count');
            $table->removeColumn('view_count');
            $table->removeColumn('comment_count');
            $table->removeColumn('last_modify_by');
            $table->removeColumn('last_modify_at');
        });

        Schema::table('authors', function (Blueprint $table) {
            $table->removeColumn('page_count');
            $table->removeColumn('book_count');
            $table->removeColumn('comment_count');
        });
    }
}
