<?php namespace App;
 
use Illuminate\Database\Eloquent\Model;
 
 
class DeviceMode extends Model
{
  protected $table = 'devices_modes';
  protected $fillable = ['name'];

  public function devices() {
    return $this->hasMany('App\Device');
  }

}