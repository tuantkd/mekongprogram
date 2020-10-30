<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectParent extends Model
{
    use HasFactory;
    protected $table = 'project_parents';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['id','user_id','project_code','project_name','project_description'];

    //Dự án cha thuộc người dùng tạo
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    //Dự án cha có nhiều dự án cấp một
    public function projectlevelone()
    {
        return $this->hasMany('App\Models\ProjectLevelOne');
    }
}
