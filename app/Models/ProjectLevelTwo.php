<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectLevelTwo extends Model
{
    use HasFactory;
    protected $table = 'project_level_twos';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'id','project_one_id','project_two_code','project_two_name_operation',
        'project_two_total_money','project_two_result_need_reach','project_two_index_need_reach','project_two_note'
    ];

    //Dự án cấp hai thuộc dự án cấp một
    public function projectlevelone()
    {
        return $this->belongsTo('App\Models\ProjectLevelOne');
    }

    //Dự án cấp hai có nhiều dự án cấp ba
    public function projectlevelthree()
    {
        return $this->hasMany('App\Models\ProjectLevelThree');
    }

    //Dự án cấp hai có nhiều lịch sử chỉnh sửa
    public function ProjectLevelTwoHistory()
    {
        return $this->hasMany('App\Models\ProjectLevelTwoHistory');
    }
}
