<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desc extends Model
{
    protected $table = 'breaks';

    protected $fillable = [
    	'h1', 'img'
	];
}
