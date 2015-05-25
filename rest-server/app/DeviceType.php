<?php namespace App;
 
use Illuminate\Database\Eloquent\Model;
 
 
class DeviceType extends Model
{
  protected $table = 'devices_types';
  protected $fillable = ['name'];

  public function devices() {
    return $this->hasMany('App\Device');
  }

}