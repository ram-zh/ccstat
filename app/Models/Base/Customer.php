<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

class Customer extends AbstractTable {

    /**
     * Generated
     */

    protected $table = 'Customers';

    protected $fillable = ['Id', 'Name'];


    public function permissions() {
        return $this->hasMany(\App\Models\Base\Permission::class, 'CustomerId', 'Id');
    }

    public function projects() {
        return $this->hasMany(\App\Models\Base\Project::class, 'CustomerId', 'Id');
    }


}

