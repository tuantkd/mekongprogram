<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectThreeAndDeploymentTime extends Model
{
    use HasFactory;
    protected $table = 'project_three_and_deployment_times';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'id','project_three_id','deployment_time_id'
    ];

    //Dự án và thời gian triển khai thuộc dự án cấp 3
    public function ProjectLevelThree()
    {
        return $this->belongsTo('App\Models\ProjectLevelThree');
    }

    //Dự án và thời gian triển khai thuộc thời gian triển khai
    public function DeploymentTime()
    {
        return $this->belongsTo('App\Models\DeploymentTime');
    }
}
