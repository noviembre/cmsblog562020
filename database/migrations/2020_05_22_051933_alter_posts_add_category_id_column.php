<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPostsAddCategoryIdColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            //
            // Option A = $table->bigInteger('category_id')->unsigned()->default(0);
            $table->bigInteger('category_id')->unsigned()->default(0);
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {

            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });
    }
}
