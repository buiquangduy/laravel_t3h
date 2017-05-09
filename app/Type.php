<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model {

    protected $table = 'types';
    protected $fillable = ['type_id','type_name'];
    //public $timestamps = false;
}
