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
    protected $fillable = ['id','project_code','project_name','project_description'];

    //Dự án cha có nhiều dự án cấp một
    public function projectlevelone()
    {
        return $this->hasMany('App\Models\ProjectLevelOne');
    }

    //Dự án cha có nhiều dự án người dùng
    public function ProjectAndUser()
    {
        return $this->hasMany('App\Models\ProjectAndUser');
    }

}
