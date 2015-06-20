<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Device;
use App\HistoryPower;
use App\HistoryPrice;

class DeviceStatusRetrieve extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'device:retrivestatus';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Retrieve status from the connected devices';

  protected $price = 0;

  /**
   * Create a new command instance.
   *
   * @return void
   */
  public function __construct()
  {
    parent::__construct();
  }

  /**
   * Execute the console command.
   *
   * @return mixed
   */
  public function handle()
  {
    $devices = Device::all();

    foreach($devices as $device) {
      $data = $this->getData($device);
      // if($data == null) 
      //   continue;

      HistoryPower::create($data);
      var_dump($data);
    }
  }


  private function getData($device) {
    $url = $this->getUrl($device);

    if(!$url) return null; // Null URL
    $httpResponseRaw = file_get_contents($url.'/');

    if(!$httpResponseRaw) return null; // Resource unavailable
    $httpResponse = json_decode($httpResponseRaw);

    if($device->type->name == "smart-plug") return $this->smartPlug($device, $httpResponse);
    else return null;
  }

  private function getUrl($device) {
    $settings = json_decode($device->settings);

    if($device->mode->name == 'ipv4') {
      if(empty($settings->ip) && empty($settings->port)) return null;
      
      return 'http://'.$settings->ip . ':' . $settings->port;
    } 
    else return null;
  }

  private function smartPlug($device, $httpResponse)
  {
    $this->price = (float)HistoryPrice::first()->price;

    $data['device_id']    = $device->id;
    $data['tension']      = $httpResponse->tension;
    $data['current']      = $httpResponse->current;
    $data['phase']        = $httpResponse->phase;
    $data['power_total']  = $data['tension'] * $data['current'];
    echo 
    $data['price']        = $data['power_total'] * ($this->price/60); // TODO: Change that to take from HistoryPrice

    return $data;
  }
}
