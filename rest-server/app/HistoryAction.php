<?php namespace App;

use Illuminate\Database\Eloquent\Model;


class HistoryAction extends Model
{
  protected $table = 'history_actions';
  protected $fillable = [
    'device_id', 'device_action_id', 
    'data_sent', 'data_received', 'sucessful'];

}