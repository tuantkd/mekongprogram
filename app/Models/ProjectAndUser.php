<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectAndUser extends Model
{
    use HasFactory;
    protected $table = 'project_and_users';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'id','user_id','project_parent_id'
    ];

    //Dự án người dùng thuộc dự án cấp cha
    public function ProjectParent()
    {
        return $this->belongsTo('App\Models\ProjectParent');
    }

    //Dự án người dùng thuộc người dùng
    public function User()
    {
        return $this->belongsTo('App\Models\User');
    }
}
