<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeploymentTime extends Model
{
    use HasFactory;
    protected $table = 'deployment_times';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'id','deployment_month_initialize','deployment_month_start','deployment_month_end',
        'deployment_number_money_initial','deployment_number_money_operating','deployment_number_money_real',
        'deployment_index_achieved','deployment_result_achieved','deployment_method_implementation',
        'deployment_address','deployment_partner','deployment_description'
    ];

    //Thời gian triển khai có nhiều dự án
    public function ProjectThreeAndDeploymentTime()
    {
        return $this->hasMany('App\Models\ProjectThreeAndDeploymentTime');
    }

    //Thời gian triển khai có nhiều lịch sử chỉnh sửa
    public function DeploymentTimeHistory()
    {
        return $this->hasMany('App\Models\DeploymentTimeHistory');
    }

    //Thời gian triển khai có nhiều lịch sử chỉnh sửa kế hoạch
    public function DeploymentTimePlanHistory()
    {
        return $this->hasMany('App\Models\DeploymentTimePlanHistory');
    }
}
