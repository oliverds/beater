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
            $table->text('name');
            $table->text('text');
            $table->text('url');
            $table->text('seo_values');
            $table->boolean('draft')->default(true);
            $table->boolean('online')->default(true);
            $table->integer('parent_id')->unsigned()->nullable();
            $table->string('technical_name')->nullable();
            $table->integer('order_column')->nullable();

            $table->timestamps();
        });

        Schema::table('pages', function (Blueprint $table) {
            $table->foreign('parent_id')->references('id')->on('pages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pages');
    }
}
