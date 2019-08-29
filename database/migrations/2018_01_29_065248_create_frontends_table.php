<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFrontendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frontends', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ban_title');
            $table->text('ban_details');
            $table->string('ban_price');
            $table->string('ban_date');
            $table->string('about_title');
            $table->string('video');
            $table->text('about_content');
            $table->string('serv_title');
            $table->text('serv_details');
            $table->string('road_title');
            $table->text('road_details');
            $table->string('team_title');
            $table->text('team_details');
            $table->string('testm_title');
            $table->text('testm_details');
            $table->string('faq_title');
            $table->text('faq_details');
            $table->string('subs_title');
            $table->text('subs_details');
            $table->text('footer1');
            $table->text('footer2');
            $table->string('secbg1');
            $table->string('secbg2');
            $table->string('secbg3');
            $table->string('secbg4');
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
        Schema::dropIfExists('frontends');
    }
}
