<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectParentHistory extends Model
{
    use HasFactory;
    protected $table = 'project_parent_histories';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['id','user_id','project_parent_id','project_code','project_name','project_description'];

    //Lịch sử dự án cấp cha thuộc dự án cấp cha
    public function ProjectParent()
    {
        return $this->belongsTo('App\Models\ProjectParent');
    }
}
