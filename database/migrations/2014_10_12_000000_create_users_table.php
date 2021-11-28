<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
			$table->string('StoreName');
			$table->string('StoreAddress');
			$table->string('StoreOwner');
			$table->string('ContactNo');
			$table->string('OpenHours');
			$table->string('maximum_cust');
			$table->string('Image')->default('icon.png');
			$table->string('email')->unique();
			$table->string('sp_password');
			$table->string('password');
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
    }
}
