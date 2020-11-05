<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectLevelTwoHistory extends Model
{
    use HasFactory;
    protected $table = 'project_level_two_histories';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'id','project_two_id','user_id','project_two_code','project_two_name_operation',
        'project_two_total_money','project_two_result_need_reach','project_two_index_need_reach','project_two_note'
    ];

    //Lịch sử chỉnh sửa thuộc dự án cấp 2
    public function ProjectLevelTwo()
    {
        return $this->belongsTo('App\Models\ProjectLevelTwo');
    }
}
