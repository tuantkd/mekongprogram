<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeploymentTimeReportHistory extends Model
{
    use HasFactory;
    protected $table = 'deployment_time_report_histories';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'id','deployment_time_id','user_id','deployment_number_money_real','deployment_index_achieved','deployment_result_achieved'
    ];

    //Lịch sử chỉnh sửa thời gian triển khai thuộc thời gian ban đầu
    public function DeploymentTime()
    {
        return $this->belongsTo('App\Models\DeploymentTime');
    }
}
