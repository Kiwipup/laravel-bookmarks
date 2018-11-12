<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookmarkCatalogueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookmark_catalogue', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('bookmark_id');
            $table->foreign('bookmark_id')->references('id')->on('bookmarks');
            $table->unsignedInteger('catalogue_id');
            $table->foreign('catalogue_id')->references('id')->on('catalogues');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookmark_catalogue');
    }
}
