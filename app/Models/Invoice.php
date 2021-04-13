<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model {

    public $table = 'invoices';

    protected $fillable = [

    ];

    protected $rules = [
    ];

    public function order()
    {
        return $this->hasOne(Order::class, 'id', 'order_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function workshop()
    {
        return $this->belongsTo(Workshop::class, 'workshop_id', 'id');
    }
}
