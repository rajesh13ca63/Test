<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()    
    {
        
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admin_id');
            $table->integer('recruiter_id');
            $table->string('Person_name');
            $table->string('Org_name');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('Type_of_opportunity');
            $table->string('Key_skills');
            $table->integer('Mobile_no');
            $table->string('Location');
            $table->string('Brief_profile');
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
        Schema::drop('clients');
    }
}
