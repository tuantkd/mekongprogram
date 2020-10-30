<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectLevelThree extends Model
{
    use HasFactory;
    protected $table = 'project_level_threes';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'id','project_two_id','project_three_code','project_three_name_operation',
        'project_three_total_money','project_three_result_need_reach','project_three_index_need_reach','project_three_note'
    ];

    //Dự án cấp ba thuộc dự án cấp hai
    public function projectleveltwo()
    {
        return $this->belongsTo('App\Models\ProjectLevelTwo');
    }

    //Dự án cấp ba có nhiều thời gian triển khai
    public function deploymenttime()
    {
        return $this->hasMany('App\Models\DeploymentTime');
    }
}
