<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admin_id');
            $table->integer('recruiter_id');
            $table->string('First_name');
            $table->string('Last_name');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->date('Dob');
            $table->string('Gender');
            $table->string('Address');
            $table->integer('Mobile_no');
            $table->string('Designation');
            $table->integer('Experience');
            $table->integer('Noticed_period');
            $table->integer('rate_from');
            $table->integer('rate_to');
            $table->string('frequency');
            $table->string('Currrent_location');   
            $table->string('Preffer_location');
            $table->string('Type_opportunity');
            $table->string('Key_skills');
            $table->string('Brief_profile');
            $table->string('Basic_education');
            $table->string('Masters');
            $table->string('Certificates');
            $table->integer('j2w_rate');
            $table->boolean('approve')->default(0);
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
