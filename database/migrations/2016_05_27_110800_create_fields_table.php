<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fields', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('field_freelancer', function (Blueprint $table) {
            $table->integer('freelancer_id')->unsigned()->index();
            $table->foreign('freelancer_id')->references('id')->on('freelancers')->onDelete('cascade');

            $table->integer('field_id')->unsigned()->index();
            $table->foreign('field_id')->references('id')->on('fields')->onDelete('cascade');

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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::drop('fields');
        Schema::drop('field_freelancer');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
