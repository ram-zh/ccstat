<?php

namespace App\Models;

class Report extends AbstractTable {

    /**
     * Generated
     */

    protected $table = 'Reports';

    protected $fillable = ['Id', 'ProjectId', 'ExternalReportId'];


    public function project() {
        return $this->belongsTo(\App\Models\Project::class, 'ProjectId', 'Id');
    }

    public function permissions() {
        return $this->hasMany(\App\Models\Permission::class, 'ReportId', 'Id');
    }


}

