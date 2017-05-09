<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Madein extends Model {

    protected $table = 'madeins';
    protected $fillable = ['made_id','country'];
    //public $timestamps = false;
}
