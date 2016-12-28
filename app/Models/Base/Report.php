<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

class Report extends AbstractTable {

    /**
     * Generated
     */

    protected $table = 'Reports';

    protected $fillable = ['Id', 'ProjectId', 'ExternalReportId'];


    public function project() {
        return $this->belongsTo(\App\Models\Base\Project::class, 'ProjectId', 'Id');
    }

    public function permissions() {
        return $this->hasMany(\App\Models\Base\Permission::class, 'ReportId', 'Id');
    }


}

