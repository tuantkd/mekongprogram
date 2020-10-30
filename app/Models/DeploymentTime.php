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
        'id','project_three_id','deployment_month','deployment_number_money',
        'deployment_address','deployment_partner','deployment_description'
    ];

    //Thời gian triển khai thuộc dự án cấp ba
    public function projectlevelthree()
    {
        return $this->belongsTo('App\Models\ProjectLevelThree');
    }
}
