<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {

    public $table = 'orders';

    protected $fillable = [
        'workshop',
        'date',
        'client_id',
    ];

    protected $rules = [
        'workshop_id' => 'required',
        'date' => 'required'
    ];

    public function workshop()
    {
        return $this->belongsTo(Workshop::class, 'workshop_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'client_id', 'id');
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'id', 'order_id');
    }
}
