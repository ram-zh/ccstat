<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

class Project extends AbstractTable {

    /**
     * Generated
     */

    protected $table = 'Projects';

    protected $fillable = ['Id', 'CustomerId', 'Name', 'APIKey', 'APIBaseUrl'];


    public function customer() {
        return $this->belongsTo(\App\Models\Base\Customer::class, 'CustomerId', 'Id');
    }

    public function permissions() {
        return $this->hasMany(\App\Models\Base\Permission::class, 'ProjectId', 'Id');
    }

    public function reports() {
        return $this->hasMany(\App\Models\Base\Report::class, 'ProjectId', 'Id');
    }


}

