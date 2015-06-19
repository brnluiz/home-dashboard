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
			
			$table->timestamps();
			$table->softDeletes();
		});

		Schema::create('devices_modes', function($table) {
		  $table->increments('id');
		  $table->string('name');
			
			$table->timestamps();
			$table->softDeletes();
		});

		Schema::create('devices', function($table) {
		  $table->increments('id');
		  $table->integer('device_type_id')->unsigned();
		  $table->integer('device_mode_id')->unsigned();
		  $table->string('name');
		  $table->string('version');
		  $table->json('settings'); // It will be different if the device uses TCP, Bluetooth or ZigBee

			$table->timestamps();
			$table->softDeletes();

		  $table->foreign('device_type_id')->references('id')->on('devices_types')->onDelete('cascade');
		  $table->foreign('device_mode_id')->references('id')->on('devices_modes')->onDelete('cascade');
		});

		Schema::create('devices_actions', function($table) {
		  $table->increments('id');
		  $table->string('name');

			$table->timestamps();
			$table->softDeletes();
		});

		Schema::create('history_power', function($table) {
		  $table->increments('id');
		  $table->integer('device_id')->unsigned();
		  
		  $table->double('tension', 10, 3);
		  $table->double('current', 10, 3);
		  $table->double('phase', 6, 3);
		  $table->double('power_total', 10, 3);
		  $table->double('power_active', 10, 3);
		  $table->double('power_reactive', 10, 3);
		  $table->double('price', 15, 3);

			$table->timestamps();
			$table->softDeletes();
		  
		  $table->foreign('device_id')->references('id')->on('devices')->onDelete('cascade');
		});

		Schema::create('history_actions', function($table) {
		  $table->increments('id');
		  $table->integer('device_id')->unsigned();
		  $table->integer('device_action_id')->unsigned();
		  
		  $table->json('data_sent');
		  $table->json('data_received');
		  $table->boolean('sucessful');

			$table->timestamps();
			$table->softDeletes();
		  
		  $table->foreign('device_id')->references('id')->on('devices')->onDelete('cascade');
		  $table->foreign('device_action_id')->references('id')->on('devices_actions')->onDelete('cascade');
		});

		Schema::create('history_prices', function($table) {
		  $table->increments('id');
		  
		  $table->date('date_start');
		  $table->time('time_from');
		  $table->time('time_to');
		  $table->double('price', 10, 3);

			$table->timestamps();
			$table->softDeletes();
		});

		Schema::create('settings', function($table) {
		  $table->increments('id');

		  $table->string('name');
		  $table->string('value');
			
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
		Schema::drop('settings');
		Schema::drop('history_actions');
		Schema::drop('history_prices');
		Schema::drop('history_power');
		Schema::drop('devices');
		Schema::drop('devices_actions');
		Schema::drop('devices_types');
		Schema::drop('devices_modes');

	}

}
