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
            $table->string('name',190);
            $table->string('email',190)->unique();
            $table->string('password',190);
            $table->rememberToken();
            $table->timestamps();
        });

         

         DB::table('users')->insert([
                'name' => 'admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('admin')
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
