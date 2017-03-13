<?php

namespace App\Models;

class Project extends AbstractTable {

    /**
     * Generated
     */

    protected $table = 'Projects';

    protected $fillable = ['Id', 'CustomerId', 'Name', 'APIKey', 'APIBaseUrl'];


    public function customer() {
        return $this->belongsTo(\App\Models\Customer::class, 'CustomerId', 'Id');
    }

    public function permissions() {
        return $this->hasMany(\App\Models\Permission::class, 'ProjectId', 'Id');
    }

    public function reports() {
        return $this->hasMany(\App\Models\Report::class, 'ProjectId', 'Id');
    }


}

