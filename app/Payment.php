<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';

    protected $fillable = ['name', 'status', 'user_id'];

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }
}
