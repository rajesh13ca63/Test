<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBootiquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      

        Schema::create('boutiques', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admin_id');
            $table->integer('recruiter_id');
            $table->string('name_firm');
            $table->string('specialized_skills');
            $table->string('address');
            $table->string('website');
            $table->string('contact_name');
            $table->integer('contact_no');
            $table->string('email');
            $table->string('password');
            $table->integer('head_counts');
            $table->string('Brief_profile');
            $table->boolean('approve')->default(0);
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
        Schema::drop('boutiques');
    }
}
