<?php

namespace App\Models;

class Permission extends AbstractTable {

    /**
     * Generated
     */

    protected $table = 'Permissions';

    protected $fillable = ['Id', 'UserId', 'GroupId', 'GrantAll', 'CustomerId', 'ProjectId', 'ReportId'];


    public function customer() {
        return $this->belongsTo(\App\Models\Customer::class, 'CustomerId', 'Id');
    }

    public function report() {
        return $this->belongsTo(\App\Models\Report::class, 'ReportId', 'Id');
    }

    public function group() {
        return $this->belongsTo(\App\Models\Group::class, 'GroupId', 'Id');
    }

    public function project() {
        return $this->belongsTo(\App\Models\Project::class, 'ProjectId', 'Id');
    }

    public function user() {
        return $this->belongsTo(\App\Models\User::class, 'UserId', 'Id');
    }


}

