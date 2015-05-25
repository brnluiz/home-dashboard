<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\DeviceAction;
use App\DeviceType;
use App\Device;
use App\Setting;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('DeviceTypeSeeder');
		$this->call('DeviceActionSeeder');
		$this->call('DeviceSeeder');
		$this->call('SettingSeeder');
	}

}

class DeviceTypeSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$types = array(
			array('name' => 'smart-lamp'),
			array('name' => 'smart-window'),
			array('name' => 'smart-plug'),
			array('name' => 'smart-thermostat'),
			array('name' => 'sensor-alarm'),
			array('name' => 'sensor-firealarm')
		);
		
		foreach ($types as $type) 
			DeviceType::firstOrCreate($type);
	}

}

class DeviceActionSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$actions = array(
			array('name' => 'turn-on'),
			array('name' => 'turn-off'),
			array('name' => 'temperature-up'),
			array('name' => 'temperature-down'),
			array('name' => 'changed-color'),
			array('name' => 'alert-on'),
			array('name' => 'alert-off'),

			array('name' => 'auto-turn-on'),
			array('name' => 'auto-turn-off'),
			array('name' => 'auto-temperature-up'),
			array('name' => 'auto-temperature-down'),
			array('name' => 'auto-changed-color'),
			array('name' => 'auto-alert-on'),
			array('name' => 'auto-alert-off')
		);

		foreach ($actions as $action) 
			DeviceAction::firstOrCreate($action);
	}

}

class DeviceSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$devices = array(
			array('name' => 'Meter Plug Beta', 
				'version' => '1.0.0.0', 
				'device_type_id' => DeviceType::where('name', 'smart-plug')->get()[0]->id )
		);

		foreach ($devices as $device) 
			Device::firstOrCreate($device);
	}

}

class SettingSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$settings = array(
			array('name' => 'tension', 'value' => '220')
			);

		foreach ($settings as $setting) 
			Setting::firstOrCreate($setting);
	}

}

