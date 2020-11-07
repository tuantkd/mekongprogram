<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeploymentTimeHistory extends Model
{
    use HasFactory;
    protected $table = 'deployment_time_histories';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'id','deployment_time_id','user_id','deployment_month_initialize',
        'deployment_number_money_initial',
        'deployment_address','deployment_partner','deployment_description'
    ];

    //Lịch sử chỉnh sửa thời gian triển khai thuộc thời gian ban đầu
    public function DeploymentTime()
    {
        return $this->belongsTo('App\Models\DeploymentTime');
    }
}
