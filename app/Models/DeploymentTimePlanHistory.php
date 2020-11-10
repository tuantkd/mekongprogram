<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeploymentTimePlanHistory extends Model
{
    use HasFactory;
    protected $table = 'deployment_time_plan_histories';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'id','deployment_time_id','user_id','deployment_day_start','deployment_month_start','deployment_year_start',
        'deployment_day_end','deployment_month_end','deployment_year_end',
        'deployment_number_money_operating','deployment_method_implementation'
    ];

    //Lịch sử chỉnh sửa thời gian triển khai thuộc thời gian ban đầu
    public function DeploymentTime()
    {
        return $this->belongsTo('App\Models\DeploymentTime');
    }
}
