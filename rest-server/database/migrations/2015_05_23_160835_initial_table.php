<?php

use Illuminate\Database\Schema\Blueprinteger;
use Illuminate\Database\Migrations\Migration;

class InitialTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

		Schema::create('devices_types', function($table) {
		  $table->increments('id');
		  $table->string('name');
			$table->softDeletes();
		});

		Schema::create('devices', function($table) {
		  $table->increments('id');
		  $table->integer('id_type')->unsigned();
		  $table->string('name');
		  $table->json('settings'); // It will be different if the device uses TCP, Bluetooth or ZigBee

			$table->timestamps();
			$table->softDeletes();

		  $table->foreign('id_type')->references('id')->on('devices_types')->onDelete('cascade');
		});

		Schema::create('devices_actions', function($table) {
		  $table->increments('id');
		  $table->string('action');
			$table->softDeletes();
		});

		Schema::create('history_power', function($table) {
		  $table->increments('id');
		  $table->integer('id_device')->unsigned();
		  
		  $table->double('tension_value', 7, 5);
		  $table->double('tension_phase', 3, 3);
		  $table->double('current_value', 7, 5);
		  $table->double('current_phase', 3, 3);
		  $table->double('power_total', 7, 5);
		  $table->double('power_active', 7, 5);
		  $table->double('power_reactive', 7, 5);
		  $table->double('price', 7, 3);

			$table->timestamps();
			$table->softDeletes();
		  
		  $table->foreign('id_device')->references('id')->on('devices')->onDelete('cascade');
		});

		Schema::create('history_actions', function($table) {
		  $table->increments('id');
		  $table->integer('id_device')->unsigned();
		  $table->integer('id_action')->unsigned();
		  
		  $table->json('data_sent');
		  $table->json('data_received');
		  $table->boolean('sucessful');

			$table->timestamps();
			$table->softDeletes();
		  
		  $table->foreign('id_device')->references('id')->on('devices')->onDelete('cascade');
		  $table->foreign('id_action')->references('id')->on('devices_actions')->onDelete('cascade');
		});

		Schema::create('history_prices', function($table) {
		  $table->increments('id');
		  
		  $table->date('date_start');
		  $table->time('time_from');
		  $table->time('time_to');
		  $table->double('price', 4, 3);

			$table->timestamps();
			$table->softDeletes();
		});

		Schema::create('settings', function($table) {
		  $table->increments('id');

		  $table->integer('default_tension');
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('settings');
		Schema::drop('history_actions');
		Schema::drop('history_prices');
		Schema::drop('history_power');
		Schema::drop('devices');
		Schema::drop('devices_actions');
		Schema::drop('devices_types');

	}

}
