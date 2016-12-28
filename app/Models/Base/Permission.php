<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

class Permission extends AbstractTable {

    /**
     * Generated
     */

    protected $table = 'Permissions';

    protected $fillable = ['Id', 'UserId', 'GroupId', 'GrantAll', 'CustomerId', 'ProjectId', 'ReportId'];


    public function customer() {
        return $this->belongsTo(\App\Models\Base\Customer::class, 'CustomerId', 'Id');
    }

    public function user() {
        return $this->belongsTo(\App\Models\Base\User::class, 'UserId', 'Id');
    }

    public function report() {
        return $this->belongsTo(\App\Models\Base\Report::class, 'ReportId', 'Id');
    }

    public function group() {
        return $this->belongsTo(\App\Models\Base\Group::class, 'GroupId', 'Id');
    }

    public function project() {
        return $this->belongsTo(\App\Models\Base\Project::class, 'ProjectId', 'Id');
    }


}

