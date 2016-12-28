<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

class Group extends AbstractTable {

    /**
     * Generated
     */

    protected $table = 'Groups';

    protected $fillable = ['Id', 'Name'];


    public function users() {
        return $this->belongsToMany(\App\Models\Base\User::class, 'GroupUsers', 'GroupId', 'UserId');
    }

    public function groupUsers() {
        return $this->hasMany(\App\Models\Base\GroupUser::class, 'GroupId', 'Id');
    }

    public function permissions() {
        return $this->hasMany(\App\Models\Base\Permission::class, 'GroupId', 'Id');
    }


}

