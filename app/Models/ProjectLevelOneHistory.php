<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectLevelOneHistory extends Model
{
    use HasFactory;
    protected $table = 'project_level_one_histories';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'id','project_one_id','user_id','project_one_code','project_one_name_operation',
        'project_one_total_money','project_one_result_need_reach','project_one_index_need_reach','project_one_note'
    ];

    //Lịch sử cấp 1 thuộc dự án cấp 1
    public function ProjectLevelOne()
    {
        return $this->belongsTo('App\Models\ProjectLevelOne');
    }
}
