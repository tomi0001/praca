<?php

use Illuminate\Support\Facades\Schema;
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
            $table->string('name',60);
            $table->string('email',100)->unique();
            $table->string('password',130);
            $table->integer('date_registration');
            $table->rememberToken();
            $table->timestamps();
        });
        
        Schema::create('work_offers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',60)->unique();
            $table->integer('price');
            $table->integer('date_add');
            $table->date('start_date');
            $table->string('city',90)->unique();
            $table->string('education',90)->unique();
            $table->integer('id_user')->unique();
            $table->rememberToken();
            $table->timestamps();
        });  
        
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description');
            $table->integer('date_add');
            $table->integer('id_user')->unique();
            $table->rememberToken();
            $table->timestamps();
        });  
        Schema::create('comments2', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description');
            $table->integer('date_add');
            $table->integer('id_user')->unique();
            $table->integer('id_comments')->unique();
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
        Schema::dropIfExists('users');
        Schema::dropIfExists('work_offers');
        Schema::dropIfExists('comments');
        Schema::dropIfExists('comments2');
        
    }
}
