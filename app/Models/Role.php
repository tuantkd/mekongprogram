<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = 'roles';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['id','role_name','role_description'];

    //Quyền có nhiều người dùng
    public function user()
    {
        return $this->hasMany('App\Models\User');
    }
}
