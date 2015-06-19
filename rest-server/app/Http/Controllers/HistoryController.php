<?php namespace App\Http\Controllers;
 
use Laravel\Lumen\Routing\Controller as BaseController;

use App\HistoryType;
use App\HistoryPower;
use Illuminate\Http\Request;

class HistoryController extends Controller{

  public function index(){
 
    $histories = HistoryPower::all();
 
    return response()->json($histories);
  }
 
  public function get($id){
 
    $history  = HistoryPower::where(array( 'device_id' => $id ))->get();

    return response()->json($history);
  }
 
  public function save(Request $request){
 
    $history = HistoryPower::create( $request->all() );

    // $history = new HistoryPower($request->all());
 
    return response()->json($history);
  }
 
  public function delete($id){
    $history  = HistoryPower::find($id);
 
    $history->delete();
 
    return response()->json('success');
  }

}