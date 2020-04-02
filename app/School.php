<?php

namespace App;

use App\models\Menu;
use App\models\Product;
use App\Notifications\School\SchoolResetPassword;
use App\Notifications\School\SchoolVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class School extends Authenticatable
{
    use Notifiable;

    public $with = ['menus'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new SchoolResetPassword($token));
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new SchoolVerifyEmail);
    }


    public function menus()
    {
        return $this->belongsToMany(Menu::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
