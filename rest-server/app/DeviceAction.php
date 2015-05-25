<?php namespace App;

use Illuminate\Database\Eloquent\Model;


class DeviceAction extends Model
{

  protected $table = 'devices_actions';
  protected $fillable = ['name'];

}