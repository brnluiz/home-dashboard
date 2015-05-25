<?php namespace App;
 
use Illuminate\Database\Eloquent\Model;


class Device extends Model
{
  protected $table = 'devices';
  protected $fillable = ['name', 'version', 'device_type_id', 'settings'];

  public function type() {
    return $this->belongsTo('App\DeviceType', 'id');
  }
}