<?php namespace App\Http\Controllers;
 
use Laravel\Lumen\Routing\Controller as BaseController;

use App\Device;
use App\DeviceType;
use Illuminate\Http\Request;
 
 
class DeviceController extends Controller{ 

  public function index(){
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

    $devices = Device::all();
    
    return response()->json($devices);
  }
 
  public function get($id){
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

    $device  = Device::find($id);
    $device->type;
    $device->mode;

    return response()->json($device);
  }
 
  public function save(Request $request){
 
    $device = Device::create( $request->all() );

    // $device = new Device($request->all());
 
    return response()->json($device);
  }
 
  public function delete($id){
    $device  = Device::find($id);
 
    $device->delete();
 
    return response()->json('success');
  }
 
  // TODO: Just accepting x-www-form-urlencoded
  public function update(Request $request, $id) {
    $device  = Device::find($id);

    if ( $request->input('name') ) 
      $device->name = $request->input('name');
    if ( $request->input('version') ) 
      $device->version = $request->input('version');  
    if ( $request->input('settings') ) 
      $device->settings = $request->input('settings');
    if ( $request->input('device_type_id') ) 
      $device->device_type_id = $request->input('device_type_id');
 
    $device->save($request->all());
 
    return response()->json($device);
  }

  public function stats($id) {
    $device = Device::find($id);
    $settings = json_decode($device->settings);

    if($settings->mode == 'tcp') {
      $url = 'http://'.$settings->ip . ':' . $settings->port;
    }
    
    $stats = file_get_contents($url.'/relay');
    if(!$stats)
      $data['error'] = 'Unavailable resource';

    $data = json_decode($stats);
      

    return response()->json($data);
  }
 
}