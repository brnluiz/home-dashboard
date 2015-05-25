<?php namespace App;

use Illuminate\Database\Eloquent\Model;


class HistoryPrice extends Model
{
  protected $table = 'history_prices';
  protected $fillable = ['data_start', 'time_from', 'time_to','price'];

}