<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectLevelThreeHistory extends Model
{
    use HasFactory;
    protected $table = 'project_level_three_histories';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'id','project_three_id','user_id','project_three_code','project_three_name_operation',
        'project_three_result_need_reach','project_three_index_need_reach','project_three_note'
    ];

    //Lịch sử chỉnh sửa dự án cấp 3 thuộc dự án cấp 3
    public function ProjectLevelThree()
    {
        return $this->belongsTo('App\Models\ProjectLevelThree');
    }
}
