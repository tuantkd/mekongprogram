<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'id','role_id','fullname','username','password',
        'email','sex','birthday','phone','address','avatar'
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

    //Người dùng thuộc quyền
    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }

    //Người dùng tạo nhiều dự án cha
    public function projectparent()
    {
        return $this->hasMany('App\Models\ProjectParent');
    }
}
