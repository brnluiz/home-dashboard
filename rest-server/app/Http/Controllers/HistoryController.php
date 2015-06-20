<?php namespace App\Http\Controllers;
 
use Laravel\Lumen\Routing\Controller as BaseController;

use App\HistoryType;
use App\HistoryPower;
use Illuminate\Http\Request;

class HistoryController extends Controller {

  public function index(Request $request){

    $histories = HistoryPower::paginate(30);
 
    return response()->json($histories);
  }
 
  public function get($id){
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    
    $history  = HistoryPower::where(array( 'device_id' => $id ))->orderBy('id', 'DESC')->paginate(30);

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