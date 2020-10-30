<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectLevelOne extends Model
{
    use HasFactory;
    protected $table = 'project_level_ones';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'id','project_parent_id','project_one_code','project_one_name_operation',
        'project_one_total_money','project_one_result_need_reach','project_one_index_need_reach','project_one_note'
    ];

    //Dự án cấp một thuộc dự án cha
    public function projectparent()
    {
        return $this->belongsTo('App\Models\ProjectParent');
    }

    //Dự án cấp một có nhiều dự án cấp hai
    public function projectleveltwo()
    {
        return $this->hasMany('App\Models\ProjectLevelTwo');
    }
}
