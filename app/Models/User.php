<?php

namespace App\Models;

use App\Notifications\PasswordReset;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'discount_counter'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function permissions()
    {
        return $this->belongsTo(Permissions::class, 'permissions_level', 'id');
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PasswordReset($token));
    }

    protected static function boot()
    {
        parent::boot();

        static::created(function($user)
        {
            //$user->name is available
            //$user->email is available
            //Do now what you want with them
        });
    }
}
