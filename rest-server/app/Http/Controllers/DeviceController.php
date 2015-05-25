<?php namespace App\Http\Controllers;
 
use Laravel\Lumen\Routing\Controller as BaseController;

use App\Device;
use App\DeviceType;
use Illuminate\Http\Request;
 
 
class DeviceController extends Controller{ 

  public function index(){
 
    $devices = Device::all();
 
    return response()->json($devices);
  }
 
  public function get($id){
 
    $device  = Device::find($id);
    $device->type;

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
 
    $device->save();
 
    return response()->json($device);
  }

  public function meter($id) {
    $device = Device::find($id);
    $settings = json_decode($device->settings);
    $data = null;

    if($settings->connection == 'tcp') {
      $url = $settings->ip . ':' . $settings->port;
      $data = null; // Implement device URL here
    }

    return response()->json($data);
  }
 
}