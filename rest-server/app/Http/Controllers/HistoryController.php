<?php namespace App\Http\Controllers;
 
use Laravel\Lumen\Routing\Controller as BaseController;

use App\History;
use App\HistoryType;
use Illuminate\Http\Request;

class HistoryController extends Controller{

  public function index(){
 
    $histories = History::all();
 
    return response()->json($histories);
  }
 
  public function get($id){
 
    $history  = History::find($id);

    return response()->json($history);
  }
 
  public function save(Request $request){
 
    $history = History::create( $request->all() );

    // $history = new History($request->all());
 
    return response()->json($history);
  }
 
  public function delete($id){
    $history  = History::find($id);
 
    $history->delete();
 
    return response()->json('success');
  }

}