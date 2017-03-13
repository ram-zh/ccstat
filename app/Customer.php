<?php

namespace App\Models;

class Customer extends AbstractTable {

    /**
     * Generated
     */

    protected $table = 'Customers';

    protected $fillable = ['Id', 'Name'];


    public function permissions() {
        return $this->hasMany(\App\Models\Permission::class, 'CustomerId', 'Id');
    }

    public function projects() {
        return $this->hasMany(\App\Models\Project::class, 'CustomerId', 'Id');
    }


}

