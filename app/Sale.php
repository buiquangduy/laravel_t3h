<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model {

    protected $table = 'sales';
    protected $fillable = ['sale_id','sale_event','discount'];
    //public $timestamps = false;
}
