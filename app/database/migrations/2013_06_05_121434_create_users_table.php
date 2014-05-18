<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Creates the users table
		Schema::create('users', function($table)
		{
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->string('username')->unique();
			$table->string('email')->unique();
			$table->string('password');
			$table->string('confirmation_code');
			$table->boolean('confirmed')->default(false);
			$table->string('first_name');
			$table->string('last_name');
			$table->string('organization');
			$table->string('phone_number');
			$table->string('phone_number_ext');
			$table->string('address');
			$table->string('city');
			$table->string('postal_code');
			$table->enum('country', array('CA', 'US'));
			$table->enum('province', array("AB", "BC", "MB", "NB", "NL", "NS", "NT", "NU", "ON", "PE", "QC", "SK", "YT"));
			$table->enum('state', array("AL", "AK", "AZ", "AR", "CA", "CO", "CT", "DE", "DC", "FL", "GA", "HI", "ID", "IL", "IN", "IA",	"KS", "KY", "LA", "ME",	"MD", "MA", "MI", "MN", "MS", "MO",	"MT", "NE", "NV", "NH",	"NJ", "NM", "NY", "NC",	"ND", "OH", "OK", "OR",	"PA", "RI", "SC", "SD",	"TN", "TX", "UT", "VT",	"VA", "WA", "WV", "WI",	"WY"));
			$table->string('remember_token',100)->nullable();
			$table->timestamps();
		});

		// Creates password reminders table
		Schema::create('password_reminders', function($table)
		{
			$table->engine = 'InnoDB';
			$table->string('email');
			$table->string('token');
			$table->timestamp('created_at');
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('password_reminders');
		Schema::drop('users');
	}

}
