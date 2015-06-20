<?php namespace App;

use Illuminate\Database\Eloquent\Model;


class HistoryPrice extends Model
{
  protected $table = 'history_prices';
  protected $fillable = ['date_start', 'time_from', 'time_to','price'];

}