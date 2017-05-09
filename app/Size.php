<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model {

    protected $table = 'sizes';
    protected $fillable = ['size_id','size_name'];
    //public $timestamps = false;
}
