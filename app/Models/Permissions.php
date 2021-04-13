<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permissions extends Model {

    public $table = 'permissions';

    protected $fillable = [
        'name',
        'description'
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'permissions_level', 'id');
    }

    public function workshop()
    {
        return $this->belongsTo(Workshop::class, 'workshop_id', 'id');
    }
}
