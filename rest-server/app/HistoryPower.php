<?php namespace App;

use Illuminate\Database\Eloquent\Model;


class HistoryPower extends Model
{
  protected $table = 'history_power';
  protected $fillable = [
    'device_id',
    'tension', 'current', 'phase', 
    'power_total', 'power_active', 'power_reactive',
    'price'];

    public function device($id) {
      return $this->belongsTo('App\Device', 'device_id');
    }

}