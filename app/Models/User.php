<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Cache;
use App\Models\Tache;
use App\Models\MaterielReclamer;


class User extends Authenticatable
{
    use HasFactory, Notifiable,HasApiTokens;

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

     
    protected $appends = ['avatar'];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function  getAvatarAttribute()
    {
        return "  https://www.gravatar.com/avatar/" . md5( strtolower( trim( $this->email ) ) )   ;
    }

     public function isUserOnline()
    {
        return Cache::has('user-is-online' .$this->id);
    }


    public function tache()
    {
        return $this->hasOne(Tache::class, 'user_id');
    }

    public function materiel()
    {
        return $this->hasOne(MaterielReclamer::class, 'user_id');
    }


}
